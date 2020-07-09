import { pt } from 'language/pt.js';
import { en } from 'language/en.js';

var arrLang = {
    "en": en.En(),
    "pt": pt.Pt()
  }; 
  
  $(document).ready(function() {
  // The default language is Portuguese
  var lang = "pt";
  $(".lang").each(function(index, element) {
    $(this).text(arrLang[lang][$(this).attr("key")]);
  });
});

// get/set the selected language
$(".translate").click(function() {
  var lang = $(this).attr("id");

  $(".lang").each(function(index, element) {
    $(this).text(arrLang[lang][$(this).attr("key")]);
  });
});