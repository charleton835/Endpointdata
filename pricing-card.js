document.querySelectorAll('.pricing-card').forEach(card => {
    card.addEventListener('click', function() {
      
        document.querySelectorAll('.pricing-card').forEach(c => c.classList.remove('selected'));
        
        
        this.classList.add('selected');
    });
});
