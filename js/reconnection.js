

function message(){
    var Name = document.getElementById('Name');
    var address = document.getElementById('address');
    var inspection_report = document.getElementById('inspection_report');
    var id_copy = document.getElementById('id_copy');
    var authorization_copy = document.getElementById('authorization_copy');
    var unpaid_bills_copy = document.getElementById('unpaid_bills_copy');
    var previous_payment = document.getElementById('previous_payment');
    var reconnection_fee = document.getElementById('reconnection_fee');
    const success = document.getElementById('success');
    const error = document.getElementById('error');


    if(inspection_report.value === '' || id_copy.value === '' || authorization_copy.value === '' || unpaid_bills_copy.value === '' || previous_payment.value === '' || reconnection_fee.value === ''){
        error.style.display = 'block';
    }
    else{
        setTimeout(() => {
            Name.value = '';
            email.value = '';
            address.value = '';
            account_number.value = '';
            inspection_report.value = '';
            id_copy.value = '';
            authorization_copy.value = '';
            unpaid_bills_copy.value = '';
            previous_payment.value = '';
            reconnection_fee.value = '';

        },4000);

        success.style.display = 'block';
        return false;

    }
    setTimeout(() => {
        error.style.display = 'none';
        success.style.display = 'none';

    },4000);


}

