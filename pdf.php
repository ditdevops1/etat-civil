<?php
require_once 'vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

include 'db.php';

if ($_POST) {
    if (!empty($_POST['prenom_nouvne']) && !empty($_POST['id'])) {
        $prenom_nouvne = $_POST['prenom_nouvne'];
        $id = $_POST['id'];
        $requete = "SELECT * FROM nouveau_ne WHERE prenom_nouvne = '$prenom_nouvne' AND id = '$id' ";
        $query = $db->prepare($requete);
        $query->execute();
        $row = $query->fetch();
        $info = "<div class='p-3'>
            les informations de : <b>" . $row['prenom_nouvne'] . ' ' . $row['nom_nouvne'] . "<div>";
    }
}

$html2pdf = new Html2Pdf('P', 'A4', 'fr');
ob_start();
?>


<style type="text/css">
      #box {
        height: 20px;
        width: 35px;

        border-bottom: 1px solid black ;
         border-left: 1px solid black;
        top: 50%;
        bottom: 0;




         content: "";
        right: 0;
        top: 0;
       /* height: 50px;
        width: 50%;*/
        border-right: 1px solid #000;
      }
      #lieux_naiss{ 

        height: 70px;
        width: 70px;
        position: relative;
        border-bottom: 2px solid #0004ff;
        background: #cccaca;
      }



      #verticale{

        height: 20px;
        width: 35px;


         border-left: 1px solid black;
        top: 50%;
        bottom: 0;

      }
      
</style>
<style type="text/css">
     #td {
        text-align: center;
         padding-left:90px;
         padding-right:90px;
         padding-top:5px; 
         padding-bottom:20px ;

     }
     

</style>

<body>
    <table style="border: 1.5px solid black;margin-left:18px;">
        <tr>

            <td> <div id="td"> REGION DE: <br><br> DAKAR  </div>    <hr width="50px">  <div id="td"> DEPARTEMENT DE: <br><br>   RUFISQUE </div> <hr width="50px">   <div id="td"><strong> COMMUNE DE: </strong> <br><br> RUFISQUE-EST </div>   </td>

            <td style="text-align: center; vertical-align: top;padding-left:90px;padding-right:90px;border-left:1px solid black ;">REPUBLIQUE DU SENEGAL <br> Un Peuple- Un But- Une Foi <br>   <br><br>
 <h2><strong>ETAT-CIVIL</strong></h2> <br><br><br><br> CENTRE DE(1) <br><br><br> Secondaire Arafat</td>
        </tr>

        <tr>
            <td style="border-top:1px solid black ; padding:10px;">
               <strong>EXTRAIT DU REGISTRE DES ACTES DE NAISSANCE</strong><br><br>
                   Pour l'année deux mille vingt deux <br><div style="text-align:center">(en lettres)</div><br> <br>  N° dans le Registre: Treize <br> <div style="text-align:center">(en lettres)</div>
            </td>

            <td style="border-top:1px solid black; border-left:1px solid black">
            <p style="text-align: center; margin-left:180px;"> <br><br>
                        <strong>AN: <?php echo  $row["annee_naisse"] ?></strong> <br><br><br> <strong><?php echo  $row["id"] ?></strong> <br> (N° dans le registre <br> en chiffres)
</p>
            </td>
        </tr>
        
        <tr>
            <td style="border-top:1px solid black ; padding:10px;">
            <div style="text-align: left;">Le  onze  <?php echo  $row["mois_naisse"] ?> Mille neuf cent quatre vingt cinq</div><br><br><br>
           à  03 heures 40 minutes est né(e) à<br><br>
            <div style="text-align: left;">un enfant de sexe <b> <?php echo  $row["sexe"] ?></b></div> <br>
            <strong style="margin-left: 50px;"><?php echo  $row["prenom_nouvne"] ?></strong><br>
            <i style="margin-left: 45px;"> PRENOM(S) </i><br><br>
            de <span style="margin-left: 30px;"> <?php echo  $row["prenom_pere"] ?></span><br>
            <i style="margin-left: 50px;">PRENOM(S) DU PERE</i><br><br>
            et de <span style="margin-left: 17px;"> <?php echo  $row["prenom_mere"] ?></span><br>
            <i style="margin-left: 50px;">PRENOM(S) DE LA MERE</i><br><br>
            Le pays de naissance pour les naissances à l'étranger(3)  <br><br>


            <div  style="text-align: right;"> (écrire en majuscules le lieu de naissance , <br> les prénoms et le nom)</div>
           

            </td>
            <td style="border-top:1px solid black ; padding:10px;">
                   <b id="lieux_naiss"><?php echo  $row["lieu_naisse"] ?></b><br>
                 <i>(4) LIEU DE NAISSANCE</i> <br><br><br><br>
                 <strong><?php echo  $row["nom_nouvne"] ?></strong><br>
                 <i>NOM DE FAMILLE</i> <br><br><br><br><br><br>
                 <?php echo  $row["nom_mere"] ?><br>
                 <i>NOM DE FAMILLE DE LA MERE</i> 


            </td>

        </tr>

        <tr>
            <td style="border-top:1px solid black ; padding:10px;" colspan="2">
                
                    <span style="margin-top:0px;">EXTRAIT DELIVRE PAR LE CENTRE DE: <br><br>Secondaire Arafat</span><br><br><br><br><br>



                    <div id="verticale"></div>


                     (1)(2)(3)(4) notes et mentions marginales au verso
                    
            </td>
           
        </tr>





        
          <tr>
            <td style="border-top:1px solid black ; padding:10px;">
                
                    <span style="margin-top:0px;">EXTRAIT DELIVRE PAR LE CENTRE DE: <br><br>Secondaire Arafat</span><br><br><br><br><br>


                     (1)(2)(3)(4) notes et mentions marginales au verso
                    
            </td>
            <td style="border-top:1px solid black ; padding:10px;">
            <span style="margin-top:0px;">POUR EXTRAIT CERTIFIE ET CONFORME <br>
                    Fait à RUFISQUE LE <?php
                    // Return current date from the remote server
                    $date = date('d-M-Y');
                    echo $date;
                    ?> <br>
                    L'officier de l'Etat-civil soussigné <br><br><br><br><br></span>

                    Prénom et Nom  
            </td>
        </tr>





          <tr>
            <td style="border-top:1px solid black ; padding:32px; " colspan="2" >
                
                  <span style="margin-top:-15px">RESERVE</span> <span style="margin-left: 3%;margin-top:-15px">3</span>
                  <span style="margin-left: 1%;margin-top:-15px">0</span>
                  <span  style="margin-left:7%; margin-top:2px">DEP</span> <span style="margin-left:5%; margin-top:2px">CL</span>
                  <span style="margin-left:5%; margin-top:2px">CEC</span> <span style="margin-left:10%; margin-top:2px">DN</span>
                  <span style="margin-left:10%; margin-top:2px">S</span>   <span style="margin-left:7%;margin-top:2px">RN</span> 
                  <span style="margin-left:10%; margin-top:2px">JDP</span> 
                <div style="margin-left:12%; margin-top:-33px;" id="box"></div>
                                <div style="margin-left:24%; margin-top:-21px;" id="box"></div>
                                <div style="margin-left:33%; margin-top:-21px;" id="box"></div>
                                <div style="margin-left:42%; margin-top:-21px;" id="box"></div>
                                <div style="margin-left:56%; margin-top:-21px;" id="box"></div>
                                <div style="margin-left:69%; margin-top:-21px;" id="box"></div>
                                <div style="margin-left:79%; margin-top:-21px;" id="box"></div>
                                <div style="margin-left:93%; margin-top:-21px;" id="box"></div>

            </td>

           
                
                  


                  
                    
            
          
        </tr>









        

    </table>
</body>

<?php

$html = ob_get_clean();

$html2pdf->writeHTML($html);
$html2pdf->output('mon_pdf.pdf');

?>