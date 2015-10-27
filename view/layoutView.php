<?php


class LayoutView {

  
  public function render($view)
  {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>ImageKing</title>
          <link rel="stylesheet" type="text/css" href="style/style.css">
        </head>
        <body>
         
          
          <div class="container">
              ' . $view->response() . '
          </div>
         </body>
      </html>
    ';
  }
  
}
