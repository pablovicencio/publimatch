<?php
require_once dirname( __DIR__ ) .'/recursos/db/db.php';

class Funciones 
{

    /*///////////////////////////////////////
    Buscar Promociones de anuncio
    //////////////////////////////////////*/
        public function busca_promo_anu($id){

            try{
                
                
                $pdo = AccesoDB::getCon();

               

                    $sql = "select count(id_promo) promo from promo where fk_id_anuncio = :id";

                
                                
                            

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();

                $response = $stmt->fetch(PDO::FETCH_ASSOC);
                return $response;

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='index.php';</script>";
            }
        }




  /*///////////////////////////////////////
    Buscar Promocion
    //////////////////////////////////////*/
        public function busca_promocion($id){

            try{
                
                
                $pdo = AccesoDB::getCon();

               

                    $sql = "select b.id_promo, a.nom_anuncio, b.desc_promo, b.img_promo, b.duracion_promo, qr_promo, a.maps_anuncio, 
                            (stock - IFNULL((select count(id_uso_promo) from uso_promo u where b.id_promo = u.fk_id_promo),0)) stock
                            from anuncios a inner join promo b on a.id_anuncio = b.fk_id_anuncio 
                            where b.vig_promo = 1 and b.id_promo = :id";

                
                                
                            

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();

                $response = $stmt->fetchAll();
                return $response;

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='index.php';</script>";
            }
        }






   /*///////////////////////////////////////
    Buscar Promociones
    //////////////////////////////////////*/
        public function busca_promo($id){

            try{
                
                
                $pdo = AccesoDB::getCon();

                if($id == 0){

                    $sql = "select b.id_promo, a.nom_anuncio, b.desc_promo, b.img_promo
                            from anuncios a inner join promo b on a.id_anuncio = b.fk_id_anuncio 
                            where b.vig_promo = 1 and a.fec_termino_anuncio >= sysdate() and b.duracion_promo > sysdate() and  b.fk_id_anuncio > 0 ";
                        }else{
                            $sql = "select b.id_promo, a.nom_anuncio, b.desc_promo, b.img_promo
                            from anuncios a inner join promo b on a.id_anuncio = b.fk_id_anuncio 
                            where b.vig_promo = 1 and a.fec_termino_anuncio >= sysdate() and b.duracion_promo > sysdate()  and b.fk_id_anuncio = :id";
                        }

                
                                
                            

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();

                $response = $stmt->fetchAll();
                return $response;

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='index.php';</script>";
            }
        }








    /*///////////////////////////////////////
    Cargar Busqueda
    //////////////////////////////////////*/
        public function cargar_portafolio($id){

            try{
                
                
                $pdo = AccesoDB::getCon();

               

                    $sql = "select count(p.id_promo) promo, a.id_anuncio, a.nom_anuncio,a.cat_anuncio , 
IFNULL((select ROUND((sum(b.nota_puntaje)/count(b.id_puntaje)), 0) from puntaje b where a.id_anuncio = b.fk_anuncio and b.vig_puntaje = 1),0) puntaje, 
IFNULL((select i.img from img_anuncio i where a.id_anuncio = i.fk_id_anuncio order by i.id_img limit 1),'https://www.w3schools.com/bootstrap4/img_avatar1.png') img
from anuncios a left join promo p on a.id_anuncio = fk_id_anuncio and p.duracion_promo > sysdate()
 where  a.cat_anuncio = :id  and a.vig_anuncio = 1 and a.fec_termino_anuncio >= sysdate() 
group by a.id_anuncio, a.nom_anuncio,a.cat_anuncio ";

                
                                
                            

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();

                $response = $stmt->fetchAll();
                return $response;

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='index.php';</script>";
            }
        }




    /*///////////////////////////////////////
    Chequear horario de atención
    //////////////////////////////////////*/


    function check_time($t1, $t2, $tn) {
        if ($t2 >= $t1) {
                return $t1 <= $tn && $tn < $t2;
            } else {
                return ! ($t2 <= $tn && $tn < $t1);
            }
        }


    /*///////////////////////////////////////
    Cargar Imagenes Anuncio
    //////////////////////////////////////*/
        public function cargar_imgs($anu){

            try{
                
                
                $pdo = AccesoDB::getCon();

                            
                                $sql = "select img from img_anuncio where fk_id_anuncio = :anu";
                           
                                
                            

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":anu", $anu, PDO::PARAM_INT);
                $stmt->execute();

                $response = $stmt->fetchAll();
                return $response;

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='index.php';</script>";
            }
        }





    /*///////////////////////////////////////
    Cargar Anuncio
    //////////////////////////////////////*/
        public function cargar_anuncio($anu){

            try{
                
                $dia = date('N');
                $pdo = AccesoDB::getCon();

                            
                                $sql = "select a.nom_anuncio,c.nom_comuna,a.dir_anuncio, a.desc_anuncio, a.fono1_anuncio fono1,a.fono2_anuncio fono2, 
ifnull(a.fb_anuncio,'0') fb,ifnull(a.ig_anuncio,'0') ig,ifnull(a.tw_anuncio,'0') tw,ifnull(a.ws_anuncio,'0') ws, h.hdesde_horario hdesde_anuncio, h.hhasta_horario hhasta_anuncio, a.maps_anuncio,
iFNULL((select ROUND((sum(b.nota_puntaje)/count(b.id_puntaje)), 0) from puntaje b where a.id_anuncio = b.fk_anuncio and b.vig_puntaje = 1),0) puntaje
 from anuncios a inner join comunas_cl c on a.comuna_anuncio = c.id_comuna inner join horario h on a.id_anuncio = h.fk_id_anuncio = 1 where  a.id_anuncio = :anu and a.vig_anuncio = 1 and h.vig_horario = 1 and dia_horario = :dia and a.fec_termino_anuncio >= sysdate()  ";
                           
                                
                            

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":anu", $anu, PDO::PARAM_INT);
                $stmt->bindParam(":dia", $dia, PDO::PARAM_INT);
                $stmt->execute();

                $response = $stmt->fetchAll();
                return $response;

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='index.php';</script>";
            }
        }







    /*///////////////////////////////////////
    Cargar Busqueda
    //////////////////////////////////////*/
        public function cargar_cat($com, $anu, $id){

            try{
                
                
                $pdo = AccesoDB::getCon();

               if($com == -1){

                    $sql = "select distinct * from (
select count(p.id_promo) promo,a.id_anuncio, a.nom_anuncio,a.cat_anuncio , 
IFNULL((select ROUND((sum(b.nota_puntaje)/count(b.id_puntaje)), 0) from puntaje b where a.id_anuncio = b.fk_anuncio and b.vig_puntaje = 1),0) puntaje,
IFNULL((select i.img from img_anuncio i where a.id_anuncio = i.fk_id_anuncio order by i.id_img limit 1),'https://www.w3schools.com/bootstrap4/img_avatar1.png') img
from anuncios a left join promo p on a.id_anuncio = fk_id_anuncio and p.duracion_promo > sysdate() where  a.comuna_anuncio <> :com and a.vig_anuncio = 1 and  a.id_anuncio <> :id and a.cat_anuncio = (select z.cat_anuncio from anuncios z where z.id_anuncio = :id) and a.fec_termino_anuncio >= sysdate() 
group by a.id_anuncio, a.nom_anuncio,a.cat_anuncio 
union all
select count(p.id_promo) promo,a.id_anuncio, a.nom_anuncio,a.cat_anuncio , 
IFNULL((select ROUND((sum(c.nota_puntaje)/count(c.id_puntaje)), 0) from puntaje c where a.id_anuncio = c.fk_anuncio and c.vig_puntaje = 1),0) puntaje,
IFNULL((select i.img from img_anuncio i where a.id_anuncio = i.fk_id_anuncio order by i.id_img limit 1),'https://www.w3schools.com/bootstrap4/img_avatar1.png') img
from anuncios a inner join cat_anuncio b on a.cat_anuncio = b.id_cat left join promo p on a.id_anuncio = fk_id_anuncio and p.duracion_promo > sysdate()
where b.nom_cat like :anu and a.comuna_anuncio <> :com and a.vig_anuncio = 1 and a.id_anuncio <> :id and a.fec_termino_anuncio >= sysdate() 
group by a.id_anuncio, a.nom_anuncio,a.cat_anuncio ) a";



                }elseif ($com == 0) {
                    $sql = "select distinct * from (
select count(p.id_promo) promo,a.id_anuncio, a.nom_anuncio,a.cat_anuncio , 
IFNULL((select ROUND((sum(b.nota_puntaje)/count(b.id_puntaje)), 0) from puntaje b where a.id_anuncio = b.fk_anuncio and b.vig_puntaje = 1),0) puntaje,
IFNULL((select i.img from img_anuncio i where a.id_anuncio = i.fk_id_anuncio order by i.id_img limit 1),'https://www.w3schools.com/bootstrap4/img_avatar1.png') img
from anuncios a left join promo p on a.id_anuncio = fk_id_anuncio and p.duracion_promo > sysdate() where  (a.nom_anuncio like :anu or a.desc_anuncio like :anu)  and a.vig_anuncio = 1 and a.id_anuncio <> :id and a.fec_termino_anuncio >= sysdate() 
group by a.id_anuncio, a.nom_anuncio,a.cat_anuncio 
union all
select count(p.id_promo) promo,a.id_anuncio, a.nom_anuncio,a.cat_anuncio , 
IFNULL((select ROUND((sum(c.nota_puntaje)/count(c.id_puntaje)), 0) from puntaje c where a.id_anuncio = c.fk_anuncio and c.vig_puntaje = 1),0) puntaje,
IFNULL((select i.img from img_anuncio i where a.id_anuncio = i.fk_id_anuncio order by i.id_img limit 1),'https://www.w3schools.com/bootstrap4/img_avatar1.png') img
from anuncios a inner join cat_anuncio b on a.cat_anuncio = b.id_cat left join promo p on a.id_anuncio = fk_id_anuncio and p.duracion_promo > sysdate()
where b.nom_cat like :anu  and a.vig_anuncio = 1 and a.id_anuncio <> :id and a.fec_termino_anuncio >= sysdate() 
group by a.id_anuncio, a.nom_anuncio,a.cat_anuncio ) a";
                




                }else{

               

                    $sql = "select distinct * from (
select count(p.id_promo) promo,a.id_anuncio, a.nom_anuncio,a.cat_anuncio , 
IFNULL((select ROUND((sum(b.nota_puntaje)/count(b.id_puntaje)), 0) from puntaje b where a.id_anuncio = b.fk_anuncio and b.vig_puntaje = 1),0) puntaje,
IFNULL((select i.img from img_anuncio i where a.id_anuncio = i.fk_id_anuncio order by i.id_img limit 1),'https://www.w3schools.com/bootstrap4/img_avatar1.png') img
from anuncios a left join promo p on a.id_anuncio = fk_id_anuncio and p.duracion_promo > sysdate() where  (a.nom_anuncio like :anu or a.desc_anuncio like :anu) and (a.comuna_anuncio = 1 or a.comuna_anuncio = 0) and a.vig_anuncio = 1 and a.id_anuncio <> :id and a.fec_termino_anuncio >= sysdate() 
group by a.id_anuncio, a.nom_anuncio,a.cat_anuncio 
union all
select count(p.id_promo) promo,a.id_anuncio, a.nom_anuncio,a.cat_anuncio , 
IFNULL((select ROUND((sum(c.nota_puntaje)/count(c.id_puntaje)), 0) from puntaje c where a.id_anuncio = c.fk_anuncio and c.vig_puntaje = 1),0) puntaje,
IFNULL((select i.img from img_anuncio i where a.id_anuncio = i.fk_id_anuncio order by i.id_img limit 1),'https://www.w3schools.com/bootstrap4/img_avatar1.png') img
from anuncios a inner join cat_anuncio b on a.cat_anuncio = b.id_cat left join promo p on a.id_anuncio = fk_id_anuncio and p.duracion_promo > sysdate()
where b.nom_cat like :anu and (a.comuna_anuncio = 1 or a.comuna_anuncio = 0) and a.vig_anuncio = 1 and a.id_anuncio <> :id and a.fec_termino_anuncio >= sysdate() 
group by a.id_anuncio, a.nom_anuncio,a.cat_anuncio ) a";
}
                
                                
                           
        
            
            $anu = "%".$anu."%";   
                                
                            

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":anu", $anu, PDO::PARAM_STR);
                $stmt->bindParam(":com", $com, PDO::PARAM_INT);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();

                $response = $stmt->fetchAll();
                return $response;

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); </script>";
            }
        }





    /*///////////////////////////////////////
    Cargar Comunas
    //////////////////////////////////////*/
        public function cargar_comunas($vig){

            try{
                
                
                $pdo = AccesoDB::getCon();

                            if ($vig == 0) {
                                $sql = "select id_comuna, nom_comuna from comunas_cl";
                            
                            }else if ($vig == 1) {
                                $sql = "select id_comuna, nom_comuna from comunas_cl where vig_comuna = 1";
                            }
        
                       
                                
                            

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                $response = $stmt->fetchAll();
                return $response;

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='index.php';</script>";
            }
        }
    }