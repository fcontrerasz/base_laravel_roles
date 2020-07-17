<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\UsuariosWeb;

class Menu extends Model
{
    public function getChildren($data, $line)
    {
        $children = [];
        foreach ($data as $line1) {
            if ($line['idmn'] == $line1['padre']) {
                $children = array_merge($children, [ array_merge($line1, ['submenu' => $this->getChildren($data, $line1) ]) ]);
            }
        }
        return $children;
    }
    public function optionsMenu2()
    {
        return $this->where('activo', 1)
            ->orderby('padre')
            ->orderby('orden')
            ->orderby('nombre')
            ->get()
            ->toArray();
    }
    public function optionsMenu($data)
    {
        $datos = Menu::whereRaw('JSON_CONTAINS(permisos,\'"'.$data.'"\', \'$.roles\')')
        ->where('activo', 1)
        ->orderby('padre')
            ->orderby('orden')
            ->orderby('nombre')
            ->get()->toArray();
        return $datos;
    }
    public static function menus()
    {
        $menus = new Menu();
        $data = $menus->optionsMenu();
        $menuAll = [];
        foreach ($data as $line) {
            $item = [ array_merge($line, ['submenu' => $menus->getChildren($data, $line) ]) ];
            $menuAll = array_merge($menuAll, $item);
        }
        return $menus->menuAll = $menuAll;
    }
    public static function vacio()
    {
        $menuAll = [];
        return $menuAll;
    }
    public static function menus2()
    {

        $menus = new Menu();
        $data = $menus->optionsMenu(auth()->user()->getRole());

        $menuAll = [];
        foreach ($data as $line) {
            $item = [ array_merge($line, ['submenu' => $menus->getChildren($data, $line) ]) ];
            $menuAll = array_merge($menuAll, $item);
        }
        return $menus->menuAll = $menuAll;
    }
}
