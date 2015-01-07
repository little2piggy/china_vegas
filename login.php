<style>
	fieldset { padding:0; border:0;}
	.ui-dialog .ui-state-error { padding: .3em; }
	.validateTips { border: 1px solid transparent; padding: 0.3em; }
</style>
<script>
	$(function() {
		$( "#dialog:ui-dialog" ).dialog( "destroy" );
		var name = $( "#username" ),
			email = $( "#email" ),
			password = $( "#password" ),
			allFields = $( [] ).add( name ).add( email ).add( password ),
			tips = $( ".validateTips" );

		function updateTips( t ) {
			t = $("#err_login").val();
			tips
				.text( t )
				.addClass( "ui-state-highlight" );
			setTimeout(function() {
				tips.removeClass( "ui-state-highlight", 1500 );
			}, 500 );
		}

		function checkLength( o, n, min, max ) {
			if ( o.val().length > max || o.val().length < min ) {
				o.addClass( "ui-state-error" );
				updateTips( "Length of " + n + " must be between " +
					min + " and " + max + "." );
				return false;
			} else {
				return true;
			}
		}

		function checkRegexp( o, regexp, n ) {
			if ( !( regexp.test( o.val() ) ) ) {
				o.addClass( "ui-state-error" );
				updateTips( n );
				return false;
			} else {
				return true;
			}
		}
		
		$( "#dialog-form" ).dialog({
			autoOpen: false,
			height: 260,
			width: 230,
			modal: true,
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
		$( "#cancel" )
			.button()
			.click(function() {
				$( "#dialog-form" ).dialog( "close" );
			});
			
		$( "#login" ).button()
			.click(function() {
				var bValid = true;
					allFields.removeClass( "ui-state-error" );
					bValid = bValid && checkLength( name, "username", 3, 16 );
					bValid = bValid && checkLength( password, "password", 5, 16 );
					bValid = bValid && checkRegexp( name, /^[a-z]([0-9a-z_])+$/i, "Username may consist of a-z, 0-9, underscores, begin with a letter." );
					bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
					if ( bValid ) {
						$( "#dialog-form" ).dialog( "close" );
					}
			});
		$( ".rate_cat" )
			.click(function() {
				$( "#dialog-form" ).dialog( "open" );
			});
	});
	</script>

<div id="dialog-form" title="<?php echo $_WDS['login']; ?>">
	<p class="validateTips"></p>
    <input id="err_login" type="hidden" value="<?php echo $_WDS['contactdiv']; ?>" />
	<form>
	<fieldset>
		<label for="name"><?php echo $_WDS['corp_code'];  ?>*:</label>
		<input type="text" name="username" id="username" class="text ui-widget-content ui-corner-all" /><br>
		<label for="password"><?php echo $_WDS['password'];?>*:</label><br>
		<input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all" /><br>&nbsp;<br> 
        <input type="button" style="font-size: 80%" id="login" name="login" value="<?php echo $_WDS['login']; ?>" />
        <input type="button" style="font-size: 80%" id="cancel" name="cancel" value="<?php echo $_WDS['cancel']; ?>" />
	</fieldset>      
	</form>
</div>