<?php

namespace Core;

use Jenssegers\Blade\Blade;
use Valitron\Validator;

class View
{

    private Validator $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function show($view, $data): string
    {
        $view_dir = dirname(__DIR__) . '/Public/views';
        $cache_dir = dirname(__DIR__) . '/Public/cache';

        $blade = new Blade($view_dir, $cache_dir);
        //return Blade::class->render($view, $data);
        $blade->share('errors', $this->validator->errors());
        $blade->share('_posts', $this->validator->data());

        $blade->directive('hasError', function ($name){
            return '<?php if (isset($errors['. $name .'])): ?>has-error<?php endif; ?>';
        });

        $blade->directive('getError', function ($name){
            return '<?php if (isset($errors['. $name .'])): ?><div class="error-msg"><?=$errors[' . $name . '][0]?></div><?php endif; ?>';
        });

        $blade->directive('getData', function ($name){
            return '<?=$_posts[' . $name . '] ?? null ?>';
        });

        $blade->directive('timeAgo', function ($date){
            return '<?=timeAgo(' . $date . ')?>';
        });

        return $blade->render($view, $data);
    }

}