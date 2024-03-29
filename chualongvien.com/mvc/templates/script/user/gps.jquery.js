(function($) { 
	var map ;
	
    $.GoogleMapObjectDefaults = {        
        zoomLevel: 15,
		imagewidth: 60,
		imageheight: 60,
		center: 'Bach Dan, Phuong 4, Vinh Long',		
		start: '#start',		
        end: '#end',
		directions: 'directions',
        submit: '#getdirections',      	
		tooltip: '<div style="overflow-x: hidden;"><img src="/data/images/bg/gate.png" height="60px" width="60px"/><span style="font:bold 24px/30px arial;color:red;padding-left:5%">Chùa Long Viễn</span><br /><span>Địa chỉ:126/27 Trần Phú, Phường4, TP.Vĩnh Long, Vĩnh Long</span><br /><span>Điện thoại:(070)3 824 152  <br /> Di Động: 09192 444 00 - 0949 661 494 <br /> Email: thichthientrilongvien@gmail.com</span></div>',
		image: 'false'
    };

    function GoogleMapObject(elementId, options) {        
        this._inited = false;
        this._map = null;
        this._geocoder = null;	
        
        this.ElementId = elementId;
        this.Settings = $.extend({}, $.GoogleMapObjectDefaults, options || '');
    }
	
	function showMaker() {					
		var center = new GLatLng(10.246895,105.98003);		
		var marker = new GMarker(center, {draggable: false}); 
		map.addOverlay(marker);		
		marker.openInfoWindowHtml('<div style="overflow-x: hidden;"><img src="/data/images/bg/gate.png" height="60px" width="60px"/><span style="font:bold 24px/30px arial;color:red;padding-left:5%">Chùa Long Viễn</span><br /><span>Địa chỉ:126/27 Trần Phú, Phường4, TP.Vĩnh Long, Vĩnh Long</span><br /><span>Điện thoại:(070)3 824 152 <br /> Di Động: 09192 444 00 - 0949 661 494 <br /> Email: thichthientrilongvien@gmail.com</span></div>');	
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
        load: function() {            
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
				
                    center = new GLatLng(10.246895,105.98003);
					
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
							marker.openInfoWindowHtml(tooltipinfo);
						}
                    }
                });
				
            }
	                
            $.data($(this.Settings.submit)[0], 'inst', this);	
			
            $(this.Settings.submit).click(function(e) {
                e.preventDefault();
                var obj = $.data(this, 'inst');
				var outputto = obj.Settings.directions;
                var from = $(obj.Settings.start).val();
                var to = $(obj.Settings.end).val();
				map.clearOverlays();
				$('#directions' ).html('');
				var gdir = new GDirections(map, document.getElementById('directions'));
				gdir.load("from: " + from + " to: " + to);
				showMaker();				
            });	
			
			$('#cboTinhThanh').change(function(e) {
                 e.preventDefault();
				var from; 
				$("select#cboTinhThanh option:selected").each(function () {
						from = $(this).text();
				});				
                var obj = $.data(this, 'inst');
                var to = $('#end').val();
				map.clearOverlays();
				$('#directions' ).html('');
				var gdir = new GDirections(map, document.getElementById('directions'));
				gdir.load("from: " + from + " to: " + to);		
				showMaker();		
            }).change();	
			
            return this;
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
