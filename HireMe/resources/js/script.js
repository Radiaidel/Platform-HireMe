function selectRole(role) {
    document.getElementById('selectedRole').value = role;

    const userCard = document.getElementById('userCard');
    const enterpriseCard = document.getElementById('enterpriseCard');

    if (role === 'user') {
        userCard.classList.add('border-indigo-900','border-2');
        userCard.classList.remove('border-indigo-400');
        enterpriseCard.classList.remove('border-indigo-900','border-2');
        enterpriseCard.classList.add('border-indigo-400');
    } else if (role === 'enterprise') {
        enterpriseCard.classList.add('border-indigo-900','border-2');
        enterpriseCard.classList.remove('border-indigo-400');
        userCard.classList.remove('border-indigo-900','border-2');
        userCard.classList.add('border-indigo-400');
    }
}