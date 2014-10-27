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
            document.getElementById("couleurPolice").addEventListener("change", function(){
        console.log("sss");
        var taillePolice = document.getElementById("taillePolice").value;
        console.log(taillePolice)
        var tailles = ['grandeur12', 'grandeur14', 'grandeur16', 'grandeur18', 'grandeur20', 'grandeur22', 'grandeur24'];
            
        var lecture = document.getElementById("lecture");
            
        for(var i=0; i< tailles.length; i++)
        {
            lecture.classList.remove(tailles[i]);
        }
            
        lecture.classList.add("grandeur"+taillePolice);
            
    });
    
    
});