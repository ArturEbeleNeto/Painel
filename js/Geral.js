/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



var BASEURL = 'http://localhost/Painel/';
       
$("form :input").on("keypress", function(e) {
    return e.keyCode != 13;
});
