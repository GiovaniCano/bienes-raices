<?php declare(strict_types=1);
namespace Router;

use Model\ActiveRecord;

class Router {
    private static $privateUrls = [
        '/admin',
        '/admin/propiedades',
        '/admin/propiedades/crear',
        '/admin/propiedades/actualizar',
        '/admin/propiedades/borrar',
        '/admin/vendedores',
        '/admin/vendedores/crear',
        '/admin/vendedores/actualizar',
        '/admin/vendedores/borrar',
        '/admin/blog',
        '/admin/blog/crear',
        '/admin/blog/actualizar',
        '/admin/blog/borrar'
    ];
    private static $gets = [];
    private static $posts = [];

    /** Register the url as GET MEthod
     * @param string $url
     * @param array $controllerMethod ["class name", "method"]
     */
    public function GET(string $url, array $controllerMethod): void {
        self::$gets[$url] = $controllerMethod;
    }

    /** Register the url as POST MEthod
     * @param string $url
     * @param array $controllerMethod ["class name", "method"]
     */
    public function POST(string $url, array $controllerMethod): void {
        self::$posts[$url] = $controllerMethod;
    }

    /** Read the current url and execute its function */
    public function checkRoute(): void {
        ActiveRecord::resetDBsAfterTimeOfSiteInactivity(900);
        
        session_start();
        $auth = $_SESSION['login'] ?? false;

        $currentUrl = $_SERVER['PATH_INFO'] ?? '/';

        /* protect private urls */
        if(in_array($currentUrl, self::$privateUrls) && !$auth) {
            self::render404();
            exit;
        }

        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            $fn = self::$gets[$currentUrl] ?? null;
        } else {
            $fn = self::$posts[$currentUrl] ?? null;
        }

        if($fn) {
            call_user_func($fn);
        } else {
            self::render404();
        }
    }

    /**
     * @param string $view view to include in "views/" folder without ".php"
     * @param array $variables The variables needed by the view in associative array format
     */
    public static function render(string $view, array $variables = []): void {

        foreach ($variables as $key => $value) {
            $$key = $value;
        }

        ob_start();
        require 'views/' . $view . '.php';
        $content = ob_get_clean();

        require 'views/masterpage.php';
    }

    private static function render404(): void {
        require 'views/404.php';
    }
}