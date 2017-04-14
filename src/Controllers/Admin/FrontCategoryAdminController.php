<?php namespace Foostart\Front\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;
use Foostart\Front\Models\FrontsCategories;
/**
 * Validators
 */
use Foostart\Front\Validators\FrontCategoryAdminValidator;

class FrontCategoryAdminController extends Controller {

    public $data_view = array();

    private $obj_front_category = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_front_category = new FrontsCategories();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {

         $params =  $request->all();

        $list_front_category = $this->obj_front_category->get_fronts_categories($params);

        $this->data_view = array_merge($this->data_view, array(
            'fronts_categories' => $list_front_category,
            'request' => $request,
            'params' => $params
        ));
        return view('front::front_category.admin.front_category_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function edit(Request $request) {

        $front = NULL;
        $front_id = (int) $request->get('id');
        

        if (!empty($front_id) && (is_int($front_id))) {
            $front = $this->obj_front_category->find($front_id);

        }

        $this->data_view = array_merge($this->data_view, array(
            'front' => $front,
            'request' => $request
        ));
        return view('front::front_category.admin.front_category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function post(Request $request) {

        $this->obj_validator = new FrontCategoryAdminValidator();

        $input = $request->all();

        $front_id = (int) $request->get('id');

        $front = NULL;

        $data = array();

        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($front_id) && is_int($front_id)) {

                $front = $this->obj_front_category->find($front_id);
            }

        } else {
            if (!empty($front_id) && is_int($front_id)) {

                $front = $this->obj_front_category->find($front_id);

                if (!empty($front)) {

                    $input['front_category_id'] = $front_id;
                    $front = $this->obj_front_category->update_front($input);

                    //Message
                    \Session::flash('message', trans('front::front.message_update_successfully'));
                    return Redirect::route("admin_front_category.edit", ["id" => $front->front_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('front::front.message_update_unsuccessfully'));
                }
            } else {

                $front = $this->obj_front_category->add_front($input);

                if (!empty($front)) {

                    //Message
                    \Session::flash('message', trans('front::front.message_add_successfully'));
                    return Redirect::route("admin_front_category.edit", ["id" => $front->front_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('front::front.message_add_unsuccessfully'));
                }
            }
        }

        $this->data_view = array_merge($this->data_view, array(
            'front' => $front,
            'request' => $request,
        ), $data);

        return view('front::front_category.admin.front_category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $front = NULL;
        $front_id = $request->get('id');

        if (!empty($front_id)) {
            $front = $this->obj_front_category->find($front_id);

            if (!empty($front)) {
                  //Message
                \Session::flash('message', trans('front::front.message_delete_successfully'));

                $front->delete();
            }
        } else {

        }

        $this->data_view = array_merge($this->data_view, array(
            'front' => $front,
        ));

        return Redirect::route("admin_front_category");
    }

}