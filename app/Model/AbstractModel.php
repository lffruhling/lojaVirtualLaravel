<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

abstract class AbstractModel extends Model
{
    public function getColumns()
    {
        return \DB::connection()->getSchemaBuilder()->getColumnListing($this->table);
    }

    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    public function _save(array $data)
    {
        $_data = !empty($data[$this->getKeyName()]) ? self::find($data[$this->getKeyName()]) : $this;

        try {
            foreach ($this->getColumns() AS $column) {
                if (array_key_exists($column, $data)) {
                    $_data->$column = $data[$column];
                }
            }
            $_data->save();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return $_data;
    }

    public function _get($id)
    {
        $key = $this->cacheKey("_get", $id);

        if (!Cache::tags($this->getTag())->has($key)) {
            $sql = $this->where($this->getKeyName(), $id);

            $query = $sql->get()->first();
            $data = !empty($query->id) ? $query : null;
            if (!is_null($data)) {
                Cache::tags($this->getTag())->put($key, $data, CACHE_DAY);
            }
        } else {
            $data = Cache::tags($this->getTag())->get($key);
        }

        return $data;
    }

    public function cacheKey($metodo, $params = null)
    {
        $metodo = str_replace("\\", "_", $this->table . $metodo);
        $metodo = str_replace("::", "_", $metodo);
        $metodo = strtolower($metodo);
        if (!empty($params)) {
            if (is_array($params)) {
                $metodo .= '_' . implode("_", $params);
            } else {
                $metodo .= '_' . $params;
            }
        }

        return $metodo;
    }

    public function getTag()
    {
        return $this->table;
    }


}
