window.addEventListener("load",function(){
    
//    change la police
    
        document.getElementById("typePolice").addEventListener("change", function(){
    
        var typePolice = document.getElementById("typePolice").value;
        
        var police = ['lobster', 'oswald', 'playfair', 'shadow'];
            
        var lecture = document.getElementById("lecture");
            
        for(var i=0; i< police.length; i++)
        {
            lecture.classList.remove(police[i]);
        }
            
        lecture.classList.add(typePolice);
            
    });
    
    
    
//    change la taille de la police
    
        document.getElementById("taillePolice").addEventListener("change", function(){
            
        var taillePolice = document.getElementById("taillePolice").value;
            
        var tailles = ['grandeur12', 'grandeur14', 'grandeur16', 'grandeur18', 'grandeur20', 'grandeur22', 'grandeur24'];
            
        var lecture = document.getElementById("lecture");
            
        for(var i=0; i< tailles.length; i++)
        {
            lecture.classList.remove(tailles[i]);
        }
            
        lecture.classList.add("grandeur"+taillePolice);
            
    });
    
    
    
//   change la luminositée de la police
        document.getElementById("couleurFond").addEventListener("change", function(){
            
        var couleurFond = document.getElementById("couleurFond").value;
            
        console.log(couleurFond)
        var bgLumino = ['bgLumino1', 'bgLumino2', 'bgLumino3', 'bgLumino4', 'bgLumino5'];
            
        var body = document.getElementById("body");
            
        for(var i=0; i< bgLumino.length; i++)
        {
            body.classList.remove(bgLumino[i]);
        }
            
        body.classList.add(couleurFond);
            
    });
    
    
 //   change la luminositée du fond d'écran
        document.getElementById("couleurPolice").addEventListener("change", function(){
        console.log("sss");
        var couleurPolice = document.getElementById("couleurPolice").value;
        console.log(couleurPolice)
        var textLumino = ['textLumino1', 'textLumino2', 'textLumino3', 'textLumino4', 'textLumino5'];
            
        var lecture = document.getElementById("lecture");
            
        for(var i=0; i< textLumino.length; i++)
        {
            lecture.classList.remove(textLumino[i]);
        }
            
        lecture.classList.add(couleurPolice);
            
    });
    
    
});