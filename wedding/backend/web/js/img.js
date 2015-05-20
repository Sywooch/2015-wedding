$(function(){
        Galleria.loadTheme('js/js/galleria.folio.min.js');
//        if(Galleria.loadTheme('js/js/galleria.folio.min.js')){
//            alert("Load true!!");
//        }
//        else alert("Load False!!");
//        if(Galleria.run('#albumView')){
//             alert("Load true!!");
//        } else alert("Load False!!");
        
	Galleria.run('#albumView',{
            imageCrop: true,
            maxScaleRatio: 1,
            preload: 3,
            fullscreenTransition:'slide'
        });
});