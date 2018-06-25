$('select[name=nickIntegrante2]').on('change', function() {
    var self = this;
    $('select[name=nickIntegrante1]').find('option').prop('disabled', function() {
        return this.value == self.value
    });
 });
 
 $('select[name=nickIntegrante1]').on('change', function() {
   var self = this;
   $('select[name=nickIntegrante2]').find('option').prop('disabled', function() {
       return this.value == self.value
   });
 });
