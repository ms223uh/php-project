<?php


class LayoutView {

  
  public function render($view, DateTimeView $dtv)
  {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Shopping-List</title>
        </head>
        <body>
          <h1>Shopping-List</h1>
          
          <div class="container">
              ' . $view->response() . '
            
          </div>
         </body>
      </html>
    ';
  }
  
}
