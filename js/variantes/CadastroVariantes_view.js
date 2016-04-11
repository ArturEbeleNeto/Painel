/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function(){
    
    $(".pick-a-color").pickAColor({
        showSpectrum            : true,
        showSavedColors         : false,    
        fadeMenuToggle          : true,
        showHexInput            : true,
        showBasicColors         : false,
        allowBlank              : false,
        inlineDropdown          : false,
        responsive              : true 
    });
    
})