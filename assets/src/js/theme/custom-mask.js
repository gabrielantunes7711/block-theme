$(document).ready(function(){
  var YTSMASKTEL = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
  },
  
  masktel = {
		onKeyPress: function(val, e, field, options) {
			field.mask(YTSMASKTEL.apply({}, arguments), options);
		}
	};

	$("input[type='tel'] , #phone").mask(YTSMASKTEL, masktel);
});
