document.addEventListener('DOMContentLoaded', () => {
    const statusSelect = document.getElementById('status');
    const preOrdersBefore = document.getElementById('pre-orders-before');
    const preOrdersAfter = document.getElementById('pre-orders-after');

    statusSelect.addEventListener('change', handleStatusSelectChange);
    preOrdersBefore.addEventListener('change', handleOrdersBefore);
    preOrdersAfter.addEventListener('change', handleOrdersAfter);
})

function handleStatusSelectChange() {
    const statusSelect = document.getElementById('status');
    let value = statusSelect.value;

    window.location.href = addValueToURL('status', value);
}

function handleOrdersBefore(){
    const preOrdersBefore = document.getElementById('pre-orders-before');
    let value = preOrdersBefore.value;

    window.location.href = addValueToURL('ordered_before', value);
}

function handleOrdersAfter(){
    const preOrdersAfter = document.getElementById('pre-orders-after');
    let value = preOrdersAfter.value;

    window.location.href = addValueToURL('ordered_after', value);
}

function addValueToURL(key, value) {
    let location = window.location.href;

    if(value == 'all'){
        let regex = new RegExp(`[&?]${key}=.*&?`);
        location = location.replace(regex, '');

        return location;
    }

    if (location.includes(key)) {
        let regex = new RegExp(`${key}=.*&?`);
        location = location.replace(regex, `${key}=${value}`);
    } else {
        if (location.includes('?')) {
            location += `&${key}=${value}`;
        } else {
            location += `?${key}=${value}`
        }
    }

    return location;
}
