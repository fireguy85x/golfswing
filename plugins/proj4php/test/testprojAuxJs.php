<script>
$(window).load(function(){ 
    function YLatToPixel(lat,elem){
    var containerHeight=$(elem).height();
    /*
    Formula
    (givenLat*heightOfContainerElement)/180
    where 360 is the total longitude in degrees
    Height is calculated from the bottom
    */

    lat+=90;
    var calculatedHeight=((lat*containerHeight)/180);
    return $(elem).offset().top+($(elem).height()-calculatedHeight);
    }

    function XLngToPixel(lng,elem){
    //Formula
    /*
    (givenLng*widthOfContainerElement)/360
    where 360 is the total longitude in degrees
    */

    var containerWidth=($(elem).width());
    lng=lng+180;
    return $(elem).offset().left+((lng*containerWidth)/360);
    }

    //Implementation
    //Assigning top and left values to the "#dot" element using pure JS LatLng to pixel calculation
    $('#pin0').css('top', YLatToPixel(-34 , $('#map_canvas')));
    $('#pin0').css('left', XLngToPixel(150,$('#map_canvas'))+'px');

})
</script>