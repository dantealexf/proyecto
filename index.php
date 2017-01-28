<!DOCTYPE HTML PUBLIC>
   <html>
       <head>
           <meta http-equiv="content-type" content="text/html; charset=UTF-8">
           <title>Prueba</title>
           
           <style type="text/css">
              body {
	            font: Arial, Helvetica, sans-serif;
              }
 
                h1,h2 {
	                font: bold  Arial, Helvetica, sans-serif;
                }
           
               /*.marco {*/
               /*    width:1000px;*/
                   /*margin:10px auto 10px auto;*/
                   /* Centrado horizontal */
               /*}*/
   
              .cabecera {
                  width:100%;
                  border:solid 1px #ccc;
                  height:50px;
                  
              }
  
              .cuerpo {
                  /*padding:10px 0 10px 0;*/
                 height:480px; 
              }        
                .columna_derecha {
                    float:right;
                    width:270px;
                    border:solid 1px #ccc;
                    padding:10px;
                    height:480px; 
                }
   
                .columna_izquierda {
                    float:left; 
                    width:170px;
                    border:solid 1px #ccc;
                    padding:10px;
                    height:480px; 
               }
   
               .columna_central {
                   /*margin-left:200px; */
                   /*margin-right:300px;*/
                   text-align: center;
                   border:solid 1px #ccc;
                   padding:10px;
                   height:480px; 
                }
    
                #footer {
                    border:solid 1px #ccc;
                  /*padding-top:30px;*/
                  height: 60px;
                   text-align:center;
                   font-size:80%;
                   clear: both;
               }
               
               .columna_central {
                	background: #f8f8f8;
                }
                .columna_derecha {
                	background: #f0efef;
                }
                .columna_izquierda {
                	background: #f0efef;
                }
               
           </style>
       </head>
       <body>
            <div class="marco">
                <div class="cabecera">
                    <h1>Cabecera</h1>
               </div>
               <div class="cuerpo">
                   <div class="columna_derecha">
                       <h2>Derecha</h2>
                    </div>
                    <div class="columna_izquierda">
                       <h2>Izquierda</h2>
                    </div>
                    <div class="columna_central">
                        <h2>Centro</h2>
                       
                    </div>
                </div>
                <div id="footer">
                    Este es el pie de pagina.
                </div>
            </div>
        </body>
    </html>
    
   