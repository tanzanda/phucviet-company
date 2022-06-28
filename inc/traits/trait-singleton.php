<?php
/**
 * Trait: allow us to use the methods or property of on trait (class) into multiple classes.
 * Singleton: allow us to ensure that there is no more than one instance of a class,
 * when instantiating obj then it should use the same obj reference for that class
 */


namespace AQUILA_THEME\Inc\Traits;

trait Singleton {
    public function __construct()
    {
    }

    // prevent obj cloning
    public function __clone()
    {
        // TODO: Implement __clone() method.
    }

    // final modifier: it cannot be override
    final public static function get_instance() {
        static $instance = [];

        /**
         * get name of class that the static (is get_instance func) is called
         */
        $called_class = get_called_class();

        if ( !isset( $instance[$called_class]) ){
            $instance[$called_class] = new $called_class();

            /**
             * create action hook
             * (Hooks are a way for one piece of code to interact/modify another piece of code at specific, pre-defined spots.)
             * khai bao mot diem neo ngay tai vi tri cua noi can thuc thi,
             * de sd action hook: su dung ham add_action de moc cai callback function vao noi da khai vao do_action.
             */
            // pre-defined spots. (xd vi tri de gan action)
            do_action( sprintf('aquila_theme_singleton_init_%s', $called_class) );
        }

        return $instance[$called_class];
    }
}