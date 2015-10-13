<?php


class LayoutView {

  
  public function render($view)
  {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Image-Upload</title>
        </head>
        <body>
          <h1</h1>
          
          <div class="container">
              ' . $view->response() . '
          </div>
         </body>
      </html>
    ';
  }
  
}
