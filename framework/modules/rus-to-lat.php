<?php
/**
 * Rus filename and link translit
 *
 * @package Xkit
 * @subpackage Rus to Lat
 *
 * 1.0 - hook  sanitize_title     | xkit_sanitize_title_with_translit()
 * 2.0 - hook  sanitize_file_name | xkit_filenames_to_latin_unqprfx()
 */



if ( defined( 'XKIT_BRUSTOLAT_MODULE_ENABLE' ) && XKIT_BRUSTOLAT_MODULE_ENABLE  ) {

	/*
	 * sanitize_title | xkit_sanitize_title_with_translit()
	 *
	 * Convert by title Cyrillic characters to Latin characters
	 */
	function xkit_sanitize_title_with_translit( $title ) {

		$gost = json_decode( '{"\u0404":"EH","\u0406":"I","\u0456":"i","\u2116":"#","\u0454":"eh","\u0410":"A","\u0411":"B","\u0412":"V","\u0413":"G","\u0414":"D","\u0415":"E","\u0401":"JO","\u0416":"ZH","\u0417":"Z","\u0418":"I","\u0419":"JJ","\u041a":"K","\u041b":"L","\u041c":"M","\u041d":"N","\u041e":"O","\u041f":"P","\u0420":"R","\u0421":"S","\u0422":"T","\u0423":"U","\u0424":"F","\u0425":"KH","\u0426":"C","\u0427":"CH","\u0428":"SH","\u0429":"SHH","\u042a":"","\u042b":"Y","\u042c":"","\u042d":"EH","\u042e":"YU","\u042f":"YA","\u0430":"a","\u0431":"b","\u0432":"v","\u0433":"g","\u0434":"d","\u0435":"e","\u0451":"jo","\u0436":"zh","\u0437":"z","\u0438":"i","\u0439":"jj","\u043a":"k","\u043b":"l","\u043c":"m","\u043d":"n","\u043e":"o","\u043f":"p","\u0440":"r","\u0441":"s","\u0442":"t","\u0443":"u","\u0444":"f","\u0445":"kh","\u0446":"c","\u0447":"ch","\u0448":"sh","\u0449":"shh","\u044a":"","\u044b":"y","\u044c":"","\u044d":"eh","\u044e":"yu","\u044f":"ya","\u00ab":"","\u00bb":"","\u2014":"-"}', true );

		return strtr( $title, $gost );
	}
	add_action( 'sanitize_title', 'xkit_sanitize_title_with_translit', 0 );


	/*
	 * sanitize_file_name | xkit_filenames_to_latin_unqprfx()
	 *
	 * Filenames to latin
	 */
	function xkit_filenames_to_latin_unqprfx( $filename ) {

		$chars_table = json_decode( '{"\/\u0410\/":"a","\/\u0411\/":"b","\/\u0412\/":"v","\/\u0413\/":"g","\/\u0414\/":"d","\/\u0430\/":"a","\/\u0431\/":"b","\/\u0432\/":"v","\/\u0433\/":"g","\/\u0434\/":"d","\/\u0415\/":"e","\/\u0416\/":"zh","\/\u0417\/":"z","\/\u0418\/":"i","\/\u0419\/":"j","\/\u0435\/":"e","\/\u0436\/":"zh","\/\u0437\/":"z","\/\u0438\/":"i","\/\u0439\/":"j","\/\u041a\/":"k","\/\u041b\/":"l","\/\u041c\/":"m","\/\u041d\/":"n","\/\u041e\/":"o","\/\u043a\/":"k","\/\u043b\/":"l","\/\u043c\/":"m","\/\u043d\/":"n","\/\u043e\/":"o","\/\u041f\/":"p","\/\u0420\/":"r","\/\u0421\/":"s","\/\u0422\/":"t","\/\u0423\/":"u","\/\u043f\/":"p","\/\u0440\/":"r","\/\u0441\/":"s","\/\u0442\/":"t","\/\u0443\/":"u","\/\u0424\/":"f","\/\u0425\/":"h","\/\u0426\/":"c","\/\u0427\/":"ch","\/\u0428\/":"sh","\/\u0444\/":"f","\/\u0445\/":"h","\/\u0446\/":"c","\/\u0447\/":"ch","\/\u0448\/":"sh","\/\u0429\/":"shch","\/\u042c\/":"","\/\u042e\/":"ju","\/\u042f\/":"ja","\/\u0449\/":"shch","\/\u044c\/":"","\/\u044e\/":"ju","\/\u044f\/":"ja","\/\u0490\/":"g","\/\u0404\/":"ye","\/\u0406\/":"i","\/\u0407\/":"yi","\/\u0491\/":"g","\/\u0454\/":"ye","\/\u0456\/":"i","\/\u0457\/":"yi","\/\u0401\/":"yo","\/\u042b\/":"y","\/\u042a\/":"","\/\u042d\/":"e","\/\u0451\/":"yo","\/\u044b\/":"y","\/\u044a\/":"","\/\u044d\/":"e","\/\u040e\/":"u","\/\u045e\/":"u","\/\u00c4\/":"ae","\/\u00d6\/":"oe","\/\u00dc\/":"ue","\/\u00df\/":"ss","\/\u00e4\/":"ae","\/\u00f6\/":"oe","\/\u00fc\/":"ue","\/\u0104\/":"a","\/\u0106\/":"c","\/\u0118\/":"e","\/\u0141\/":"l","\/\u0143\/":"n","\/\u0105\/":"a","\/\u0107\/":"c","\/\u0119\/":"e","\/\u0142\/":"l","\/\u0144\/":"n","\/\u00d3\/":"o","\/\u015a\/":"s","\/\u0179\/":"z","\/\u017b\/":"z","\/\u00f3\/":"o","\/\u015b\/":"s","\/\u017a\/":"z","\/\u017c\/":"z","\/\u0150\/":"o","\/\u0170\/":"u","\/\u0151\/":"o","\/\u0171\/":"u","\/\u011a\/":"e","\/\u0160\/":"s","\/\u010c\/":"c","\/\u0158\/":"r","\/\u017d\/":"z","\/\u011b\/":"e","\/\u0161\/":"s","\/\u010d\/":"c","\/\u0159\/":"r","\/\u017e\/":"z","\/\u00dd\/":"y","\/\u00c1\/":"a","\/\u00c9\/":"e","\/\u010e\/":"d","\/\u0164\/":"t","\/\u00fd\/":"y","\/\u00e1\/":"a","\/\u00e9\/":"e","\/\u010f\/":"d","\/\u0165\/":"t","\/\u0147\/":"n","\/\u00da\/":"u","\/\u016e\/":"u","\/\u0148\/":"n","\/\u00fa\/":"u","\/\u016f\/":"u","\/\u0391\/":"a","\/\u0392\/":"v","\/\u0393\/":"g","\/\u0394\/":"d","\/\u0395\/":"e","\/\u03b1\/":"a","\/\u03b2\/":"v","\/\u03b3\/":"g","\/\u03b4\/":"d","\/\u03b5\/":"e","\/\u0396\/":"z","\/\u0397\/":"i","\/\u0398\/":"th","\/\u0399\/":"i","\/\u039a\/":"k","\/\u03b6\/":"z","\/\u03b7\/":"i","\/\u03b8\/":"th","\/\u03b9\/":"i","\/\u03ba\/":"k","\/\u039b\/":"l","\/\u039c\/":"m","\/\u039d\/":"n","\/\u039e\/":"x","\/\u039f\/":"o","\/\u03bb\/":"l","\/\u03bc\/":"m","\/\u03bd\/":"n","\/\u03be\/":"x","\/\u03bf\/":"o","\/\u03a0\/":"p","\/\u03a1\/":"r","\/\u03a3\/":"s","\/\u03a4\/":"t","\/\u03a5\/":"y","\/\u03c0\/":"p","\/\u03c1\/":"r","\/\u03c3\/":"s","\/\u03c4\/":"t","\/\u03c5\/":"y","\/\u03a6\/":"f","\/\u03a7\/":"ch","\/\u03a8\/":"ps","\/\u03a9\/":"o","\/\u0386\/":"a","\/\u03c6\/":"f","\/\u03c7\/":"ch","\/\u03c8\/":"ps","\/\u03c9\/":"o","\/\u03ac\/":"a","\/\u0388\/":"e","\/\u0389\/":"i","\/\u038a\/":"i","\/\u038c\/":"o","\/\u038e\/":"y","\/\u03ad\/":"e","\/\u03ae\/":"i","\/\u03af\/":"i","\/\u03cc\/":"o","\/\u03cd\/":"y","\/\u038f\/":"o","\/\u03aa\/":"i","\/\u03ab\/":"y","\/\u03ce\/":"o","\/\u03c2\/":"s","\/\u0390\/":"i","\/\u03ca\/":"i","\/\u03cb\/":"y","\/\u03b0\/":"y","\/\u00c0\/":"a","\/\u00c2\/":"a","\/\u00c3\/":"a","\/\u00c5\/":"a","\/\u00e0\/":"a","\/\u00e2\/":"a","\/\u00e3\/":"a","\/\u00e5\/":"a","\/\u00c6\/":"ae","\/\u00c7\/":"c","\/\u00c8\/":"e","\/\u00ca\/":"e","\/\u00e6\/":"ae","\/\u00e7\/":"c","\/\u00e8\/":"e","\/\u00ea\/":"e","\/\u00cb\/":"e","\/\u00cc\/":"i","\/\u00cd\/":"i","\/\u00ce\/":"i","\/\u00cf\/":"i","\/\u00eb\/":"e","\/\u00ec\/":"i","\/\u00ed\/":"i","\/\u00ee\/":"i","\/\u00ef\/":"i","\/\u00d0\/":"d","\/\u00d1\/":"n","\/\u00d2\/":"o","\/\u00d4\/":"o","\/\u00d5\/":"o","\/\u00f0\/":"d","\/\u00f1\/":"n","\/\u00f2\/":"o","\/\u00f4\/":"o","\/\u00f5\/":"o","\/\u00d7\/":"x","\/\u00d8\/":"o","\/\u00d9\/":"u","\/\u00db\/":"u","\/\u00f8\/":"o","\/\u00f9\/":"u","\/\u00fb\/":"u","\/\u00de\/":"p","\/\u0178\/":"y","\/\u00fe\/":"p","\/\u00ff\/":"y","\/\u2116\/":"","\/\u201c\/":"","\/\u201d\/":"","\/\u00ab\/":"","\/\u00bb\/":"","\/\u201e\/":"","\/@\/":"","\/%\/":"","\/\u2018\/":"","\/\u2019\/":"","\/`\/":"","\/\u00b4\/":"","\/\u00ba\/":"o","\/\u00aa\/":"a"}', true );

		// rewrite some chars for some languages
		$locale = get_locale();
		switch ( $locale ) {
			case 'uk_UA': // Ukrainian
			case 'uk_ua':
			case 'uk':
				$chars_table_ext = json_decode( '{"\/\u0413\/":"h","\/\u0433\/":"h","\/\u0418\/":"y","\/\u0438\/":"y"}', true );
				$chars_table = array_merge( $chars_table, $chars_table_ext );
				break;
			case 'sv_SE': // Swedish
			case 'sv_se':
				$chars_table_ext = json_decode( '{"\/\u00c5\/":"a","\/\u00e5\/":"a","\/\u00c4\/":"a","\/\u00e4\/":"a","\/\u00d6\/":"o","\/\u00f6\/":"o"}', true );
				$chars_table = array_merge( $chars_table, $chars_table_ext );
				break;
			case 'bg_BG': // Bulgarian
			case 'bg_bg':
				$chars_table_ext = json_decode( '/\u0429\/":"sht","\/\u0449\/":"sht","\/\u042a\/":"a","\/\u044a\/":"a"}', true );
				$chars_table = array_merge( $chars_table, $chars_table_ext );
				break;
		}

		$friendly_filename = preg_replace( array_keys( $chars_table ), array_values( $chars_table ), $filename );

		return strtolower( $friendly_filename ); // filename to lowercase
	}
	add_filter( 'sanitize_file_name', 'xkit_filenames_to_latin_unqprfx', 10 );
}
?>