function selectOption(option) {
    document.querySelectorAll('.user-option').forEach(opt => {
        opt.classList.remove('selected'); 
    });
    const selectedOption = option === 'Client' ? 'clientOption' : 'freelancerOption';
    document.getElementById(selectedOption).checked = true; 
    document.querySelector(`.${option.toLowerCase()}-option`).classList.add('selected'); 

    document.getElementById('createAccountBtn').disabled = false; 
}