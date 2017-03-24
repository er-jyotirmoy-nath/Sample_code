angular.module('addrecord')
.component('loadView',{
	templateUrl:'library_view/load_view_template.html',
	controller:function libraryloadCtrl(libraryfactory){
		var myapp = this;
		myapp.list = libraryfactory.query();
		//Get-with params - myapp.list = libraryfactory.query({book_id:42});
		//Put with params -  libraryfactory.loan({book_id:43});
		var postdata = {
					"id":46,
					"title":"Novoneel Chakraborty",
					"book_name":"Black Suits You"};
		libraryfactory.save({},postdata);

		myapp.load_book = function load_book(nid){
			alert(nid);
			libraryfactory.loan({book_id:id});
		};

		//libraryfactory.delete({book_id:1});
		
	}

});



angular.module('library_factory')
.factory('libraryfactory', ['$resource', function($resource){
	return $resource('http://localhost/library_app/app/php/manage.php/:book_id', {book_id:'@book_id'}, {
		
		loan:{
			method:"PUT",
			params:{book_id:'@book_id'},
			isArray:false
		}

	});
}]);





//php


<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
   header( "HTTP/1.1 200 OK" );
   exit;
}

require_once "manage_class.php";
$obj = new Library();
switch ($_SERVER['REQUEST_METHOD']) {
    case "GET": 
    //echo $_SERVER['REQUEST_URI'];
        $id = explode("http://localhost/library_app/app/php/manage.php/", $_SERVER['REQUEST_URI']);
        if (isset($id[1])) {
            /* Query the database to get the information about the book with ID = $id[1] */
            $result = $obj->get_book_by_id($id[1]);
        } else {
            /* Query the database to get the information about all the books */
            
            $result = $obj->get_books();
        }
        break;
    case "POST":
         
             $d = json_decode(file_get_contents("php://input"), true);

        // Save a new record in the database 
       $result = $obj->register_new_book($d);
        break;
    case "PUT":
        // Retrieve additional data 
 
        $d = json_decode(file_get_contents("php://input"), true);

        $result = $obj->loan_book($d);
        break;

    case "DELETE": 
    
    $id = explode("http://localhost/library_app/app/php/manage.php/", $_SERVER['REQUEST_URI']);
        if (isset($id[1])) {
            $result = $obj->delete_book($id[1]);
        }
        break;
}

$json = json_encode($result);
echo $json;
?>
