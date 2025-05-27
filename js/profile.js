document.addEventListener("DOMContentLoaded", function () {
    const viewAllBtn = document.getElementById('viewAllRecordsBtn');
    const allRecordsDiv = document.getElementById('allRecords');
  
    allRecordsDiv.addEventListener('shown.bs.collapse', () => {
      viewAllBtn.innerHTML = 'Hide Records <i class="fas fa-arrow-up"></i>';
    });
  
    allRecordsDiv.addEventListener('hidden.bs.collapse', () => {
      viewAllBtn.innerHTML = 'View All Records <i class="fas fa-arrow-right"></i>';
    });
  });
  