<?php

namespace Foostart\Front\Models;

use Illuminate\Database\Eloquent\Model;

class FrontsCategories extends Model {

    protected $table = 'fronts_categories';
    public $timestamps = false;
    protected $fillable = [
        'front_category_name'
    ];
    protected $primaryKey = 'front_category_id';

    public function get_fronts_categories($params = array()) {
        $eloquent = self::orderBy('front_category_id');

        if (!empty($params['front_category_name'])) {
            $eloquent->where('front_category_name', 'like', '%'. $params['front_category_name'].'%');
        }
        $fronts_category = $eloquent->paginate(10);
        return $fronts_category;
    }

    /**
     *
     * @param type $input
     * @param type $front_id
     * @return type
     */
    public function update_front($input, $front_id = NULL) {

        if (empty($front_id)) {
            $front_id = $input['front_category_id'];
        }

        $front = self::find($front_id);

        if (!empty($front)) {

            $front->front_category_name = $input['front_category_name'];

            $front->save();

            return $front;
        } else {
            return NULL;
        }
    }

    /**
     *
     * @param type $input
     * @return type
     */
    public function add_front($input) {

        $front = self::create([
                    'front_category_name' => $input['front_category_name'],
        ]);
        return $front;
    }
}
