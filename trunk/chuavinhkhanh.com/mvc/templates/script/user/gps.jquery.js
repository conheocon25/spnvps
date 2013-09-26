(function($) { 
	var map ;	
	var locationPathCode = 1;
	
    $.GoogleMapObjectDefaults = {        
        zoomLevel: 10,
		imagewidth: 50,
		imageheight: 50,
		center: 'chua vinh khanh, Luc Sy Thanh, Tra On Vinh Long, Viet Nam',		
		start: '#start',		
        end: '#end',
		directions: 'directions',
        submit: '#getdirections',      	
		tooltip: 'Chùa Vĩnh Khánh,xã Lục Sỹ Thành, Trà Ôn, Vĩnh Long, Việt Nam',
		image: 'false'
    };
	
    function GoogleMapObject(elementId, options) {        
        this._inited = false;
        this._map = null;
        this._geocoder = null;	
        
        this.ElementId = elementId;
        this.Settings = $.extend({}, $.GoogleMapObjectDefaults, options || '');
    }
	
	function showMakerMap01() {					
		var center = new GLatLng(9.97099,105.897179);		
		var marker = new GMarker(center, {draggable: false}); 
		map.addOverlay(marker);		
		marker.openInfoWindowHtml('Chùa Vĩnh Khánh, ấp Tân Thành, xã Lục Sỹ Thành, huyện Trà Ôn, Vĩnh Long, Việt Nam');			
	}
	
	function showMakerMap02() {					
		var center = new GLatLng(9.921994,105.98794);		
		var marker = new GMarker(center, {draggable: false}); 
		map.addOverlay(marker);		
		marker.openInfoWindowHtml('Chùa Quan Âm,ấp Tích Lộc, xã Tích Thiện, huyện Trà Ôn, Vĩnh Long, Việt Nam');
		
	}
	
	
			
    $.extend(GoogleMapObject.prototype, {
        init: function() {
            if (!this._inited) {
                if (GBrowserIsCompatible()) {
                    this._map = new GMap2(document.getElementById(this.ElementId));
                    this._map.addControl(new GSmallMapControl());
                    this._geocoder = new GClientGeocoder();
					//this._map.setMapType(G_SATELLITE_MAP);
					this._map.setMapType(G_NORMAL_MAP);
					//this._map.setMapType(G_HYBRID_MAP);										
					this._map.enableScrollWheelZoom();										
					this._map.setUIToDefault();											
                }		
                this._inited = true;
            }
        },
        loadMap01: function() {            
            this.init();	    
            if (this._geocoder) {                
                var zoom = this.Settings.zoomLevel;
                var center = this.Settings.center;
				var width = this.Settings.imagewidth;
				var height = this.Settings.imageheight;
                map = this._map;
		
				if (this.Settings.tooltip != 'false') {
					var customtooltip = true;
					var tooltipinfo = this.Settings.tooltip;
				}				
				if (this.Settings.image != 'false') {
					var customimage = true;
					var imageurl = this.Settings.image;
				}		
                this._geocoder.getLatLng(center, function(point) {
				
                    center = new GLatLng(9.97099,105.897179);
					
					if (!point) { alert(center + " not found"); }
                    else {
                        //set center on the map
                        map.setCenter(center, zoom);
			
						if (customimage == true) {
							//add the marker
							var customiconsize = new GSize(width, height);
							var customicon = new GIcon(G_DEFAULT_ICON, imageurl);
							customicon.iconSize = customiconsize;
							var marker = new GMarker(center, { icon: customicon });
							map.addOverlay(marker);
						} else {
							var marker = new GMarker(center);
							map.addOverlay(marker);
						}
						
						if(customtooltip == true) {
							marker.openInfoWindowHtml('Chùa Vĩnh Khánh, ấp Tân Thành, xã Lục Sỹ Thành, huyện Trà Ôn, Vĩnh Long, Việt Nam');	
							
						}
                    }
                });
				
            }
	                
            	
			
            return this;
        },
		loadMap02: function() {            
            this.init();	    
            if (this._geocoder) {                
                var zoom = this.Settings.zoomLevel;
                var center = this.Settings.center;
				var width = this.Settings.imagewidth;
				var height = this.Settings.imageheight;
                map = this._map;
		
				if (this.Settings.tooltip != 'false') {
					var customtooltip = true;
					var tooltipinfo = this.Settings.tooltip;
				}				
				if (this.Settings.image != 'false') {
					var customimage = true;
					var imageurl = this.Settings.image;
				}		
                this._geocoder.getLatLng(center, function(point) {
                   	center = new GLatLng(9.921994,105.98794);
					
					if (!point) { alert(center + " not found"); }
                    else {
                        //set center on the map
                        map.setCenter(center, zoom);
			
						if (customimage == true) {
							//add the marker
							var customiconsize = new GSize(width, height);
							var customicon = new GIcon(G_DEFAULT_ICON, imageurl);
							customicon.iconSize = customiconsize;
							var marker = new GMarker(center, { icon: customicon });
							map.addOverlay(marker);
						} else {
							var marker = new GMarker(center);
							map.addOverlay(marker);
						}
						
						if(customtooltip == true) {
							marker.openInfoWindowHtml('Chùa Quan Âm, ấp Tích Lộc, xã Tích Thiện, huyện Trà Ôn, Vĩnh Long, Việt Nam');
						}
                    }
                });
				
            }        
           	
			
            return this;
        },
		findpath: function(from , to, pathcode){			
			map.clearOverlays();
			var gdir = new GDirections(map, document.getElementById('directions'));
			gdir.load("from: " + from + " to: " + to);
			
			if (pathcode == 1) {
				showMakerMap01();
			}
			if (pathcode == 2) {
				showMakerMap02();
			}
		}
    });

    $.extend($.fn, {
        googleMap: function(options) {           
            var mapInst = $.data(this[0], 'googleMap');
            if (mapInst) {
                return mapInst;
            }           
            mapInst = new GoogleMapObject($(this).attr('id'), options);
            $.data(this[0], 'googleMap', mapInst);
            return mapInst;
        }
    });
	
})(jQuery);

