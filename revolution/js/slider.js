/* (homepage -1 )*/

  jQuery(function() {
    tpj = jQuery;

    if(tpj("#rev_slider_1_1").revolution == undefined){
        revslider_showDoubleJqueryError("#rev_slider_1_1");

      }else{

        revapi2 = tpj("#rev_slider_1_1").show().revolution({
        sliderType:"standard",
        visibilityLevels:"1240,1240,778,480",
        gridwidth:"1330,1330,778,480",
        gridheight:"750,750,450,350",
        perspective:600,
        perspectiveType:"global",
        editorheight:"750,750,450,350",
        responsiveLevels:"1330,1330,778,480",
        progressBar:{disableProgressBar:true},
        navigation: {
          onHoverStop:false,
          arrows: {
            enable:true,
            style:"hesperiden",
            hide_onmobile:true,
            hide_under:778,
            hide_onleave:true,
            left: {
              h_offset:30
            },
            right: {
              h_offset:30
            }
          }
        },
        fallbacks: {
          allowHTML5AutoPlayOnAndroid:true
        },
      });
    }
  });