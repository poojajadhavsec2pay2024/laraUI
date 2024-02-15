//Phone number validation
function phonenumber(e,number){
    var unicode=e.charCode? e.charCode : e.keyCode;
    if (unicode<48||unicode>57){
        return false ;
    }else{
        var id = ("#".concat(number));
        $(id).on('input', function(e) {
        if (this.value.length > 10) {
            e.preventDefault();
            this.value = this.value.substr(0, 10);
          }
        });
        return true;
    }
}

//OTP VALIDATION
function otpval(e,otp){
    var unicode=e.charCode? e.charCode : e.keyCode;
    if (unicode<48||unicode>57){
        return false ;
    }else{
        var id = ("#".concat(otp));
        $(id).on('input', function(e) {
        if (this.value.length > 6) {
            e.preventDefault();
            this.value = this.value.substr(0, 6);
          }
        });
        return true;
    }
}

function setbankotpval(e,otp){
    var unicode=e.charCode? e.charCode : e.keyCode;
    if (unicode<48||unicode>57){
        return false ;
    }else{
        var id = ("#".concat(otp));
        $(id).on('input', function(e) {
        if (this.value.length > 5) {
            e.preventDefault();
            this.value = this.value.substr(0, 5);
          }
        });
        return true;
    }
}

//OTP VALIDATION FOR DMT ONLY
function otpvalDMT(e,otp){
    var unicode=e.charCode? e.charCode : e.keyCode;
    if (unicode<48||unicode>57){
        return false ;
    }else{
        var id = ("#".concat(otp));
        $(id).on('input', function(e) {
        if (this.value.length > 10) {
            e.preventDefault();
            this.value = this.value.substr(0, 10);
          }
        });
        return true;
    }
}

//IFSC CODE VALIDATION

function ifscvalidation(e,ifsc){
    var id = ("#".concat(ifsc));
    var charCode = e.keyCode;
    if ((charCode > 47 && charCode < 58) || (charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)){
        $(id).on('input', function(e) {
        if (this.value.length > 11) {
            e.preventDefault();
            this.value = this.value.substr(0, 11);
            jQuery(id).keyup(function() {
          		$(this).val($(this).val().toUpperCase());
          	}); 
          }
        });
        return true;
    }else{
        return false;
    }
}

//validation for only numbers
function onlynumbers(e){
    var unicode=e.charCode? e.charCode : e.keyCode;
    if (unicode<48||unicode>57){
        return false ;
    }else{
        return true;
    }
}

//validation for amount
function addAmount(e,amount){
    var id = ("#".concat(amount));
    var unicode=e.charCode? e.charCode : e.keyCode;
    if (unicode<48||unicode>57){
        return false ;
    }else{
        $(id).on('input', function(e) {
        if (this.value.length > 6) {
            e.preventDefault();
            this.value = this.value.substr(0, 6);
          }
        });
        return true;
    }
}

//validation for Account number
function accountnumber(e,number){
    
    var id = ("#".concat(number));
    var unicode=e.charCode? e.charCode : e.keyCode;
    if (unicode<48||unicode>57){
        return false ;
    }else{
        $(id).on('input', function(e) {
        if (this.value.length > 20) {
            e.preventDefault();
            this.value = this.value.substr(0, 20);
          }
        });
        return true;
    }
}


//Postal code validation
function postalcode(e,pincode){
    var unicode=e.charCode? e.charCode : e.keyCode;
    if (unicode<48||unicode>57){
        return false;
    }else{
        var id = ("#".concat(pincode));
        $(id).on('input', function(e) {
        if (this.value.length > 6) {
            e.preventDefault();
            this.value = this.value.substr(0, 6);
          }
        });
        return true;
    }
}

// Email validation
function emailstructure(e){
    var charCode = e.keyCode;
    if ((charCode > 47 && charCode < 58) || (charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || (charCode > 44 && charCode < 47) || (charCode == 95))
        return true;
    else
        return false;
}

//Pan Validation
function pannumbers(e){
    var charCode = e.keyCode;
    if ((charCode > 47 && charCode < 58) || (charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)){
        $('#pan').on('input', function(e) {
        if (this.value.length > 10) {
            e.preventDefault();
            this.value = this.value.substr(0, 10);
            
            jQuery('#pan').keyup(function() {
          		$(this).val($(this).val().toUpperCase());
          	}); 
          }
        });
        return true;
    }else{
        return false;
    }
}

function accountholder (e,name){
    var id = ("#".concat(name));
    var charCode = e.keyCode;
    if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || (charCode == 32) || (charCode == 46)  || (charCode == 45) || (charCode > 47 && charCode < 58)){
        $(id).on('input', function(e) {
        if (this.value.length > 30) {
            e.preventDefault();
            this.value = this.value.substr(0, 30);
          }
        });
        return true;
    }else
        return false;
}

// City validation
function alphabetsOnly(e,number){
    var id = ("#".concat(number));
    var charCode = e.keyCode;
    if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || (charCode == 32))
        return true;
    else
        return false;
}
/*220523-Anuja*/
 function characterspacenumfullstoponly(event){
           
        var charCode = event.which || event.keyCode;
  
        if(
             (charCode >= 48 && charCode <= 57) ||    // 0-9
            (charCode >= 65 && charCode <= 90) ||    // A-Z
            (charCode >= 97 && charCode <= 122) ||   // a-z
            charCode === 32 ||                       // space
            charCode === 46                      // full stop
        ){
            return true;
        } else {
            return false;
        }
    }
  /*270523-Anuja*/  
    function characternumonly(event){
           
        var charCode = event.which || event.keyCode;
  
        if(
             (charCode >= 48 && charCode <= 57) ||    // 0-9
            (charCode >= 65 && charCode <= 90) ||    // A-Z
            (charCode >= 97 && charCode <= 122)  // a-z
        ){
            return true;
        } else {
            return false;
        }
    }
/*Aadhaar Number validate using verhoeff algorithm*/    
        var d = [
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
            [1, 2, 3, 4, 0, 6, 7, 8, 9, 5],
            [2, 3, 4, 0, 1, 7, 8, 9, 5, 6],
            [3, 4, 0, 1, 2, 8, 9, 5, 6, 7],
            [4, 0, 1, 2, 3, 9, 5, 6, 7, 8],
            [5, 9, 8, 7, 6, 0, 4, 3, 2, 1],
            [6, 5, 9, 8, 7, 1, 0, 4, 3, 2],
            [7, 6, 5, 9, 8, 2, 1, 0, 4, 3],
            [8, 7, 6, 5, 9, 3, 2, 1, 0, 4],
            [9, 8, 7, 6, 5, 4, 3, 2, 1, 0]
        ];
        var p = [
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
            [1, 5, 7, 6, 2, 8, 3, 0, 9, 4],
            [5, 8, 0, 3, 7, 9, 6, 1, 4, 2],
            [8, 9, 1, 6, 0, 4, 3, 5, 2, 7],
            [9, 4, 5, 3, 1, 2, 6, 8, 7, 0],
            [4, 2, 8, 6, 5, 7, 3, 9, 0, 1],
            [2, 7, 9, 3, 8, 0, 6, 4, 1, 5],
            [7, 0, 4, 6, 9, 1, 3, 2, 5, 8]
        ];

        var inv = [0, 4, 3, 2, 1, 5, 6, 7, 8, 9];

        function validateAadhar(aadharNumber) {
            var c = 0;
            var invertedArray = invArray(aadharNumber);

            for (var i = 0; i < invertedArray.length; i++) {
                c = d[c][p[(i % 8)][invertedArray[i]]];
            }
              
            return (c === 0);
        }

        function invArray(array) {
            if (typeof array === 'number') {
                array = String(array);
            }

            if (typeof array === 'string') {
                array = array.split('').map(Number);
            }

            return array.reverse();
        }
        
        // 06062023-Anuja
        function characterspacenumonly(event){
               
            var charCode = event.which || event.keyCode;
      
            if(
                 (charCode >= 48 && charCode <= 57) ||    // 0-9
                (charCode >= 65 && charCode <= 90) ||    // A-Z
                (charCode >= 97 && charCode <= 122) ||   // a-z
                charCode === 32 ||                       // space
                charCode === 46                      // full stop
            ){
                return true;
            } else {
                return false;
            }
        }
        //231123-ANuja
        function slabadd(e,slab){
            var unicode=e.charCode? e.charCode : e.keyCode;
            if (unicode<48||unicode>57){
                return false ;
            }else{
                var id = ("#".concat(slab));
                $(id).on('input', function(e) {
                   
                if (this.value.length > 3) {
                    e.preventDefault();
                    this.value = this.value.substr(0, 3);
                  }
                });
                return true;
            }
       }
        
    
 //jyot08-12-23 for file compresssion
  function compressDocuments(file) {
            console.log("compressDocuments Call Comes");
            
            const fileName = file.name;
      
            const fileExtension = fileName.split('.').pop().toLowerCase();
            if(fileExtension === 'jpeg' || fileExtension === 'jpg' || fileExtension === 'png'){
          
                
                const maxImageSizeInBytesImg = 1024 * 1024; // Maximum size for image
                const maxAttemptsIMG = 3; // Maximum attempts for compression
                
                let IMGattempts = 0;

                return new Promise((resolve, reject) => {
                    const compress = () => {
                        new Compressor(file, {
                            quality: 0.5,
                            maxWidth: 1920,
                            maxHeight: 1920,
                            success(compressedResult) {
                                const compressedFile = new File([compressedResult], file.name, {
                                    type: 'image/jpeg', // Adjust the type if needed
                                });
                                
                                if (compressedFile.size <= maxImageSizeInBytesImg) {
                                    resolve(compressedFile);
                                } else if (IMGattempts < maxAttemptsIMG) {
                                    IMGattempts++;
                                    compress(); // Retry compression
                                } else {
                                    reject('File size is still larger than the maximum allowed size.');
                                }
                            },
                            error(err) {
                                reject(err.message);
                            },
                        });
                    };
            
                    compress(); // Initial compression attempt
                });
            }
            else if(fileExtension === 'pdf'){
              return new Promise((resolve, reject) => {
                const maxSizeInBytes = 1024 * 1024; // Maximum size for PDF
                const maxAttempts = 3; // Maximum attempts for PDF compression
                
                let attempts = 0;
    
                const reader = new FileReader();
    
                reader.onload = async function () {
                    try {
                        const pdfData = new Uint8Array(this.result);
                        const pdfDoc = await PDFLib.PDFDocument.load(pdfData);
    
                        let compressedPdfBytes = await pdfDoc.save();
    
                        while (attempts < maxAttempts) {
                            attempts++;
    
                            const compressedPdfFile = new File([compressedPdfBytes], file.name, {
                                type: 'application/pdf',
                            });
    
                            if (compressedPdfFile.size <= maxSizeInBytes) {
                                resolve(compressedPdfFile);
                                return;
                            }
    
                            compressedPdfBytes = await pdfDoc.save();
                        }
    
                        reject('File size is still larger than 1MB after compression attempts.');
                    } catch (error) {
                        reject('Unable to compress PDF.');
                    }
                };
    
                reader.onerror = function (error) {
                    reject(error);
                };
    
                reader.readAsArrayBuffer(file);
             });
               
            }
           
        }

        



