// Toggle FAQ answers
document.addEventListener('DOMContentLoaded', function() {
    const faqQuestions = document.querySelectorAll('.faq-question');
    faqQuestions.forEach(question => {
        question.addEventListener('click', () => {
            const faqItem = question.parentElement;
            faqItem.classList.toggle('active');
        });
    });
    
    // File upload functionality
    const uploadArea = document.getElementById('uploadArea');
    if(uploadArea) {
        uploadArea.addEventListener('click', () => {
            const input = document.createElement('input');
            input.type = 'file';
            input.multiple = true;
            input.accept = 'image/*,video/*';
            input.onchange = (e) => {
                const files = e.target.files;
                handleFiles(files);
            };
            input.click();
        });
    }
    
    // Settings menu functionality
    const settingsMenuItems = document.querySelectorAll('.settings-menu li a');
    settingsMenuItems.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
            settingsMenuItems.forEach(i => i.classList.remove('active'));
            item.classList.add('active');
        });
    });
});

function handleFiles(files) {
    const filePreview = document.querySelector('.file-preview');
    if (!filePreview) return;
    
    for(let i = 0; i < Math.min(files.length, 5); i++) {
        const file = files[i];
        const fileItem = document.createElement('div');
        fileItem.className = 'file-item';
        
        if(file.type.startsWith('image/')) {
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            fileItem.appendChild(img);
        } else {
            const icon = document.createElement('i');
            icon.className = 'fas fa-file-video';
            fileItem.appendChild(icon);
        }
        
        const removeBtn = document.createElement('div');
        removeBtn.className = 'file-remove';
        removeBtn.innerHTML = '<i class="fas fa-times"></i>';
        removeBtn.onclick = () => fileItem.remove();
        fileItem.appendChild(removeBtn);
        
        filePreview.appendChild(fileItem);
    }
}

// Job bookmark functionality
function toggleBookmark(jobId) {
    // Send AJAX request to toggle bookmark
    fetch(`/jobs/${jobId}/bookmark`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update UI
            const bookmarkBtn = document.querySelector(`[data-job-id="${jobId}"]`);
            if (bookmarkBtn) {
                bookmarkBtn.classList.toggle('bookmarked');
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// Job application functionality
function applyForJob(jobId) {
    // Send AJAX request to apply for job
    fetch(`/jobs/${jobId}/apply`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('تم التقديم للوظيفة بنجاح!');
        } else {
            alert('حدث خطأ أثناء التقديم للوظيفة');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('حدث خطأ أثناء التقديم للوظيفة');
    });
}

// Search functionality
function searchJobs() {
    const searchInput = document.getElementById('job-search');
    const searchTerm = searchInput.value;
    
    // Send AJAX request to search jobs
    fetch(`/jobs/search?q=${encodeURIComponent(searchTerm)}`, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
        },
    })
    .then(response => response.json())
    .then(data => {
        // Update jobs container with search results
        const jobsContainer = document.querySelector('.jobs-container');
        if (jobsContainer) {
            jobsContainer.innerHTML = data.html;
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// Filter functionality
function filterJobs() {
    const form = document.getElementById('job-filters');
    const formData = new FormData(form);
    
    // Send AJAX request to filter jobs
    fetch('/jobs/filter', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'X-Requested-With': 'XMLHttpRequest',
        },
    })
    .then(response => response.json())
    .then(data => {
        // Update jobs container with filtered results
        const jobsContainer = document.querySelector('.jobs-container');
        if (jobsContainer) {
            jobsContainer.innerHTML = data.html;
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// Profile form submission
function updateProfile() {
    const form = document.getElementById('profile-form');
    const formData = new FormData(form);
    
    fetch('/profile/update', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('تم تحديث الملف الشخصي بنجاح!');
        } else {
            alert('حدث خطأ أثناء تحديث الملف الشخصي');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('حدث خطأ أثناء تحديث الملف الشخصي');
    });
}

// Settings form submission
function updateSettings() {
    const form = document.getElementById('settings-form');
    const formData = new FormData(form);
    
    fetch('/settings/update', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('تم حفظ الإعدادات بنجاح!');
        } else {
            alert('حدث خطأ أثناء حفظ الإعدادات');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('حدث خطأ أثناء حفظ الإعدادات');
    });
}

// Feedback form submission
function submitFeedback() {
    const form = document.getElementById('feedback-form');
    const formData = new FormData(form);
    
    fetch('/feedback/submit', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('تم إرسال رسالتك بنجاح! سنتواصل معك قريباً.');
            form.reset();
        } else {
            alert('حدث خطأ أثناء إرسال الرسالة');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('حدث خطأ أثناء إرسال الرسالة');
    });
}

// Social share functionality
function shareJob(jobId, platform) {
    const jobUrl = window.location.origin + `/jobs/${jobId}`;
    let shareUrl = '';
    
    switch(platform) {
        case 'whatsapp':
            shareUrl = `https://wa.me/?text=${encodeURIComponent('وظيفة مميزة: ' + jobUrl)}`;
            break;
        case 'facebook':
            shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(jobUrl)}`;
            break;
        case 'twitter':
            shareUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(jobUrl)}&text=${encodeURIComponent('وظيفة مميزة')}`;
            break;
        case 'linkedin':
            shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(jobUrl)}`;
            break;
    }
    
    if (shareUrl) {
        window.open(shareUrl, '_blank', 'width=600,height=400');
    }
}

// Notification toggle functionality
function toggleNotification(type) {
    fetch('/settings/notifications', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            type: type,
            enabled: document.getElementById(`notification-${type}`).checked
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Notification setting updated');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// Language selection functionality
function changeLanguage(lang) {
    fetch('/settings/language', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            language: lang
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.reload();
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
} 