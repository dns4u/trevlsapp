<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
class BaseController extends Controller
{
    protected function loadCommonDataToView($view_path)
    {
        View::composer($view_path, function ($view) {
            $view->with('dashboard_url', route('admin.dashboard'));
        });

        return $view_path;
    }
    public function checkDirectoryExist()
    {
        if (!file_exists(public_path($this->folder_path))) {
            mkdir(public_path($this->folder_path));
        }
    }


    protected function rowExist($row)
    {
        if (!$row) {
            request()->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route)->send();
        }
    }
}
