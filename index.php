
<?php
if(isset($_GET['page']) && $_GET['page']=="Admin panel"){
    include "views/admin/fixed/head.php";
    include "views/admin/fixed/nav.php";
    if(isset($_GET['admin'])){
        switch($_GET['admin']){
            case "Insert jela":
            include "views/admin/insertJela.php";
            break;
            case "Spisak jela":
                include "views/admin/spisakJela.php";
                break;
             case "profilePage":
                    include "views/admin/profilePage.php";
                    break;
                    case "Restoran informacije":
                        include "views/admin/restoranInfoPrikaz.php";
                        break; 
                        case "Update jela":
                            include "views/admin/updateJela.php";
                            break; 
                            case "Posete sajtu":
                            include "views/admin/posete.php";
                                break; 
                                case "Dashboard":
                                    include "views/admin/dashboard.php";
                                        break; 
                                        case "Kategorije":
                                            include "views/admin/kategorije.php";
                                                break; 
                                                case "Kolicine":
                                                    include "views/admin/kolicine.php";
                                                        break; 
                                                        case "Tags":
                                                            include "views/admin/tags.php";
                                                                break; 
                                                                case "Korisnici":
                                                                    include "views/admin/korisniciLista.php";
                                                                        break; 
                                                                        case "AddUser":
                                                                            include "views/admin/AddUser.php";
                                                                                break; 
                                                                                case "Uloge":
                                                                                    include "views/admin/uloge.php";
                                                                                        break; 
                                                                                        case "Meni":
                                                                                            include "views/admin/meni.php";
                                                                                                break; 
                                                                        
                                                
                                default:
                                include "views/admin/dashboard.php";
    }}
    else{
        include "views/admin/dashboard.php";
    }
    include "views/admin/fixed/footer.php";
}
else{
    include "views/site/fixed/head.php";
    include "views/site/fixed/nav.php";

    if(isset($_GET['page']) && $_GET['page']!="Admin panel"){
    switch($_GET['page']){
        case "Shop":
            include "views/site/shop.php";
            break;
        case "Contact":
        include "views/site/contact.php";
        break;
        case "Menu":
            include "views/site/menu.php";
            break;
        case "Product":
            include "views/site/product.php";
            break;
            case "Cart":
                include "views/site/cart.php";
                break;
                case "About":
                    include "views/site/about.php";
                    break;
        default:
        include "views/site/home.php";
        
      
}}
else{
    include "views/site/home.php";  
}

include "views/site/fixed/footer.php";
}
       


?>
