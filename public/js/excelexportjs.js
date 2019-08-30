/*
 * jQuery Client Side Excel Export Plugin Library
 * http://techbytarun.com/
 *
 * Copyright (c) 2013 Batta Tech Private Limited
 * https://github.com/tarunbatta/ExcelExportJs/blob/master/LICENSE.txt
 *
 * March 22, 2017 - Update by Maynard for IE 11.09 up compatability
 * 
 */

(function ($) {
    var $defaults = {
        containerid: null
        , datatype: 'table'
        , dataset: null
        , columns: null
        , returnUri: false
        , worksheetName: "Vacunas"
        , encoding: "utf-8"
    };

    var $settings = $defaults;

    $.fn.excelexportjs = function (options) {

        $settings = $.extend({}, $defaults, options);

        var gridData = [];
        var excelData;

        return Initialize();
		
		function Initialize() {
            var type = $settings.datatype.toLowerCase();

            BuildDataStructure(type);


            switch (type) {
                case 'table':
                    excelData = Export(ConvertFromTable());
                    break;
                case 'json':
                    excelData = Export(ConvertDataStructureToTable());
                    break;
                case 'xml':
                    excelData = Export(ConvertDataStructureToTable());
                    break;
                case 'jqgrid':
                    excelData = Export(ConvertDataStructureToTable());
                    break;
            }

       
            if ($settings.returnUri) {
                return excelData;
            }
            else {

                if (!isBrowserIE())
                {
                    window.open(excelData);
                }

               
            }
        }

        function BuildDataStructure(type) {
            switch (type) {
                case 'table':
                    break;
                case 'json':
                    gridData = $settings.dataset;
                    break;
                case 'xml':
                    $($settings.dataset).find("row").each(function (key, value) {
                        var item = {};

                        if (this.attributes != null && this.attributes.length > 0) {
                            $(this.attributes).each(function () {
                                item[this.name] = this.value;
                            });

                            gridData.push(item);
                        }
                    });
                    break;
                case 'jqgrid':
                    $($settings.dataset).find("rows > row").each(function (key, value) {
                        var item = {};

                        if (this.children != null && this.children.length > 0) {
                            $(this.children).each(function () {
                                item[this.tagName] = $(this).text();
                            });

                            gridData.push(item);
                        }
                    });
                    break;
            }
        }

        function ConvertFromTable() {
            var result = $('<div>').append($('#' + $settings.containerid).clone()).html();            
            return result;
        }

        function ConvertDataStructureToTable() {
            var result = "<table id='tabledata'>";
            result += "<thead><tr><th colspan='5'>&nbsp;</th><th bgcolor='#494529' style='text-align:center; height: 50px; color: white; border: 1px solid #DFE3E8;' colspan='3'>HEPATITIS</th><th style='text-align:center; height: 50px; color: white;  border: 1px solid  #DFE3E8;' bgcolor='#1F497D' colspan='2'>TIFOIDEA</th><th style='text-align:center; height: 50px; color: white;  border: 1px solid  #DFE3E8;' bgcolor='#E26B0A' colspan='5'>TETANOS</th></tr><tr>";
            $($settings.columns).each(function (key, value) {
                if (this.ishidden != true) {
                    result += "<th";
                    
                    if (this.style != null) {
                        result += " style='" + this.style + "'";
                    }
                    if (this.bgcolor != null){
                        result += " bgcolor='" + this.bgcolor + "'";
                    }
                    result += ">";
                    result += this.headertext;
                    result += "</th>";
                }
            });
            result += "</tr></thead>";

            result += "<tbody>";
            $(gridData).each(function (key, value) {
                result += "<tr >";
                $($settings.columns).each(function (k, v) {
                    //console.log(this.datafield);
                    if (value.hasOwnProperty(this.datafield)) {
                        if (this.ishidden != true) {
                            var color = "#fff";
                            var aux_d = value[this.datafield];
                            var req_d = value["F_NAC"];
                            var tuvo_h = value["TUVO_HEPA"];
                            var tuvo_t = value["TUVO_TIFU"];

                            var fecha_1 = value["PROX_REFUERZO_H"];
                            if(fecha_1){
                                var res = fecha_1.split("/");
                                fecha_1 = res[1]+"/"+res[0]+"/"+res[2];
                            }

                            var fecha_2 = value["PROX_REFUERZO_TI"];
                            if(fecha_2){
                                var res = fecha_2.split("/");
                                fecha_2 = res[1]+"/"+res[0]+"/"+res[2];
                            }

                            var fecha_3 = value["PROX_REFUERZO_T"];
                            if(fecha_3){
                                var res = fecha_3.split("/");
                                fecha_3 = res[1]+"/"+res[0]+"/"+res[2];
                            }
                            var rut = value["RUT"];

                                /*
                            const date1 = new Date('7/13/2010');
                            const date2 = new Date('12/15/2010');
                            const diffTime = Math.abs(date2.getTime() - date1.getTime());
                            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                            console.log(diffDays);
                                */

                            if(aux_d === null){
                                aux_d = "PENDIENTE";
                                color = "#FDE9D9";
                            }
                            if(this.datafield == "F_NAC" && parseInt(aux_d) <= 1975){
                                color = "#EFEFEF";
                            }

                            if(this.datafield == "TETA_DOSIS2" && parseInt(req_d) > 1975){
                                color = "#FFFAAD";
                                aux_d = "NO REQUERIDO";
                            }

                            if(this.datafield == "TETA_DOSIS3" && parseInt(req_d) > 1975){
                                color = "#FFFAAD";
                                aux_d = "NO REQUERIDO";
                            }


                            if(this.datafield == "PROX_REFUERZO_H"){

                                let date1 = new Date(fecha_1);
                               // alert(date1);
                                let date2 = new Date();
                                let diffTime = Math.abs(date1.getTime() - date2.getTime());
                                let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                               // console.log("FALTAN: "+diffDays);
                                 if(fecha_1 === null){
                                    diffDays = -1;
                                 }

                              //  
                                if(diffDays > 0) color = "#9BFFC0";
                                if(diffDays <= 0) color = "#FDE9D9";
                            }

                            if(this.datafield == "PROX_REFUERZO_TI"){

                                let date1 = new Date(fecha_2);
                                let date2 = new Date();
                                let diffTime = Math.abs(date1.getTime() - date2.getTime());
                                let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                               // console.log("FALTAN: "+diffDays);
                                 if(fecha_2 === null){
                                    diffDays = -1;
                                 }

                              //  
                                if(diffDays > 0) color = "#9BFFC0";
                                if(diffDays <= 0) color = "#FDE9D9";
                            }

                            if(this.datafield == "PROX_REFUERZO_T"){

                                let date1 = new Date(fecha_3);
                                let date2 = new Date();
                                let diffTime = Math.abs(date1.getTime() - date2.getTime());
                                let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                               // console.log("FALTAN: "+diffDays);
                                 if(fecha_3 === null){
                                    diffDays = -1;
                                 }

                              //  
                                if(diffDays > 0) color = "#9BFFC0";
                                if(diffDays <= 0) color = "#FDE9D9";
                            }

                            if(this.datafield == "HEPA_DOSIS1" && tuvo_h == "1" ){
                            	color = "#FFFAAD";
                                aux_d = "TUVO ENFERMEDAD";
                            }

                            if(this.datafield == "HEPA_DOSIS2" && tuvo_h == "1" ){
                            	color = "#FFFAAD";
                                aux_d = "TUVO ENFERMEDAD";
  	                        }

                            if(this.datafield == "PROX_REFUERZO_H" && tuvo_h == "1" ){
                            	color = "#FFFAAD";
                                aux_d = "TUVO ENFERMEDAD";
                            }

                            if(this.datafield == "TIFO_ULTIMA_DOSIS" && tuvo_t == "1" ){
                            	color = "#FFFAAD";
                                aux_d = "TUVO ENFERMEDAD";
  	                        }

							if(this.datafield == "PROX_REFUERZO_TI" && tuvo_t == "1" ){
                            	color = "#FFFAAD";
                                aux_d = "TUVO ENFERMEDAD";
  	                        }

                            result += "<td bgcolor='"+color+"' ";
                           // console.log("--->"+this.style);
                            if (this.style != null) {
                                result += " style='" + this.style + "'";
                            }
                            result += ">";

                            result += aux_d;
                            result += "</td>";
                        }
                    }
                });
                result += "</tr>";
            });
            result += "</tbody>";

            result += "</table>";

            return result;
        }

        function Export(htmltable) {

            if (isBrowserIE()) {
        
                exportToExcelIE(htmltable);
            }
            else {
                var excelFile = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:x='urn:schemas-microsoft-com:office:excel' xmlns='http://www.w3.org/TR/REC-html40'>";
                excelFile += "<head>";
                excelFile += '<meta http-equiv="Content-type" content="text/html;charset=' + $defaults.encoding + '" />';
                excelFile += "<!--[if gte mso 9]>";
                excelFile += "<xml>";
                excelFile += "<x:ExcelWorkbook>";
                excelFile += "<x:ExcelWorksheets>";
                excelFile += "<x:ExcelWorksheet>";
                excelFile += "<x:Name>";
                excelFile += "{worksheet}";
                excelFile += "</x:Name>";
                excelFile += "<x:WorksheetOptions>";
                excelFile += "<x:DisplayGridlines/>";
                excelFile += "</x:WorksheetOptions>";
                excelFile += "</x:ExcelWorksheet>";
                excelFile += "</x:ExcelWorksheets>";
                excelFile += "</x:ExcelWorkbook>";
                excelFile += "</xml>";
                excelFile += "<![endif]-->";
                excelFile += "</head>";
                excelFile += "<body>";
                excelFile += htmltable.replace(/"/g, '\'');
                excelFile += "</body>";
                excelFile += "</html>";

                var uri = "data:application/vnd.ms-excel;base64,";
                var ctx = { worksheet: $settings.worksheetName, table: htmltable };

                return (uri + base64(format(excelFile, ctx)));
            }
        }

        function base64(s) {
            return window.btoa(unescape(encodeURIComponent(s)));
        }

        function format(s, c) {
            return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; });
        }

        function isBrowserIE() {
            var msie = !!navigator.userAgent.match(/Trident/g) || !!navigator.userAgent.match(/MSIE/g);
            if (msie > 0) {  // If Internet Explorer, return true
                return true;
            }
            else {  // If another browser, return false
                return false;
            }
        }

        function exportToExcelIE(table) {


            var el = document.createElement('div');
            el.innerHTML = table;

            var tab_text = "<table border='2px'><tr bgcolor='#87AFC6'>";
            var textRange; var j = 0;
            var tab;
                  

            if ($settings.datatype.toLowerCase() == 'table') {            
                tab = document.getElementById($settings.containerid);  // get table              
            }
            else{
                tab = el.children[0]; // get table
            }

          
        
            for (j = 0 ; j < tab.rows.length ; j++) {
                tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
                //tab_text=tab_text+"</tr>";
            }

            tab_text = tab_text + "</table>";
            tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
            tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
            tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE ");

            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
            {
                txtArea1.document.open("txt/html", "replace");
                txtArea1.document.write(tab_text);
                txtArea1.document.close();
                txtArea1.focus();
                sa = txtArea1.document.execCommand("SaveAs", true, "download");
            }
            else                
                sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));

            return (sa);


        }
        
    };
})(jQuery);


//get columns
function getColumns(paramData){

	var header = [];
	$.each(paramData[0], function (key, value) {
		//console.log(key + '==' + value);
		var obj = {}
		obj["headertext"] = key;
		obj["datatype"] = "string";
		obj["datafield"] = key;
		header.push(obj);
	}); 
	return header;

}
