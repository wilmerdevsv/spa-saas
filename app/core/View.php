<?php
namespace App\Core;
class View {public static function render(string $template,array $data=[]): void {extract($data, EXTR_SKIP); $file=__DIR__.'/../views/'.$template.'.php'; if(!is_file($file)) throw new \RuntimeException('View not found'); require __DIR__.'/../views/layouts/header.php'; require $file; require __DIR__.'/../views/layouts/footer.php';}}
