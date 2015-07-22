var college = function(){
	$.ajax({
		url: '/xsy/index.php?m=Baoming&a=college',
		'dataType': 'json',
		success: function(data){
			$("select#college").html('<option value="error">请选择</option>');
			$.each(data, function(i, college){
				$("select#college").append('<option>'+college+'</option>');
			});
			$("select#college").append('<option>学院未知</option>');
		}
	});
};

var major = function(){
	var college = $("select#college").find("option:selected").text();
	$("select#zhuanye").html('<option value="error">请稍等……</option>');
	$.ajax({
		url: '/xsy/index.php?m=Baoming&a=major&college='+college,
		'dataType': 'json',
		success: function(data){
			$("select#zhuanye").html('<option value="error">请选择</option>');
			$.each(data, function(i, college){
				$("select#zhuanye").append('<option>'+college+'</option>');
			});
			$("select#zhuanye").append('<option>专业未知</option>');
		}
	});
};

college();