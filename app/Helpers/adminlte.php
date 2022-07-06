<?php

use Hashids\Hashids;
use Illuminate\Support\Facades\View;

/**
 * This file is part of AdminLTE.
 *
 */

if (! function_exists('encodeId')) {
	function encodeId($id)
	{
		$date = date('Ymd').'kixcellent';
		$hash = new Hashids($date, 14);
		return $hash->encode($id);
	}
}

if (! function_exists('decodeId')) {
	function decodeId($str, $toString = true)
	{
		$date = date('Ymd').'kixcellent';
		$hash = new Hashids($date, 14);
		$decoded = $hash->decode($str);
		return $toString ? implode(',', $decoded) : $decoded;
	}
}

if (! function_exists('get_plugins'))
{
	function get_plugins( $type = 'css' )
	{
        $data = '';
        foreach(config('adminlte.plugins') as $pluginName => $plugin) {
            if($plugin['active'] || View::getSection('plugins.' . ($plugin['name'] ?? $pluginName))) {
                foreach($plugin['files'] as $file) {
                    // Setup the file location
                    if (! empty($file['asset'])) {
                        $file['location'] = asset($file['location']);
                    }
                    // Check requested file type
                    if($file['type'] == $type && $type == 'css') {
                        $data .= "<link rel='stylesheet' href='" . $file['location'] . "'>\n\t\t";
                    } elseif($file['type'] == $type && $type == 'js') {
                        $data .= "<script src='" . $file['location'] . "' " . (!empty($file['defer']) ? 'defer' : '') . "></script>\n\t\t";
                    }
                }
            }
        }
        return $data;
	}
}


if (! function_exists('action_buttons'))
{
	function action_buttons( $type, $id , $viewBtn=true, $editBtn=true, $deleteBtn=true)
	{
        $buttons = '';

        if($viewBtn){
            $buttons .= '<a href="' . route($type.'.show', $id) . '" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </a>';
        }
        if($editBtn){
            $buttons .= '<a href="' . route($type.'.edit', $id) . '" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>';
        }
        if($editBtn){
            $buttons .= '<form method="POST" action="' . route($type.'.destroy', $id) . '" accept-charset="UTF-8" style="display:inline">
                            <input name="_method" type="hidden" value="DELETE">
                            <input type="hidden" name="_token" value="' . csrf_token() . '" />
                            <button class="btn btn-xs btn-default text-danger mx-1 shadow" type="submit" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        </form>';
        }

        return $buttons;
	}
}
