@extends('layouts.app')

@section('title', 'تعديل الملف الشخصي - فرصتي')

@section('content')
<section id="profile-edit" class="page-container active" style="padding:0;">
    <div class="container">
        <div class="page-header">
            <h2 class="page-title">تعديل الملف الشخصي</h2>
            <a href="{{ route('profile.index') }}" class="btn btn-outline">
                <i class="fas fa-arrow-right"></i> العودة للملف الشخصي
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin: 0; padding-right: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="profile-edit-container">
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                
                <div class="form-section">
                    <h3 class="section-title">المعلومات الأساسية</h3>
                    
                    <div class="form-group">
                        <label>الاسم الكامل *</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>البريد الإلكتروني *</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>الدولة *</label>
                        <select class="form-control @error('country_id') is-invalid @enderror" name="country_id" required>
                            <option value="">اختر الدولة</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}" {{ old('country_id', $user->country_id) == $country->id ? 'selected' : '' }}>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('country_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-section">
                    <h3 class="section-title">المعلومات المهنية</h3>
                    
                    <div class="form-group">
                        <label>مستوى التعليم</label>
                        <select class="form-control @error('education_level_id') is-invalid @enderror" name="education_level_id">
                            <option value="">اختر مستوى التعليم</option>
                            @foreach($educationLevels as $level)
                                <option value="{{ $level->id }}" {{ old('education_level_id', $user->education_level_id) == $level->id ? 'selected' : '' }}>
                                    {{ $level->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('education_level_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>سنوات الخبرة</label>
                        <input type="number" class="form-control @error('work_experience') is-invalid @enderror" name="work_experience" value="{{ old('work_experience', $user->work_experience) }}" min="0">
                        @error('work_experience')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>رقم الهاتف</label>
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="+966501234567">
                        @error('phone')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>نبذة شخصية</label>
                        <textarea class="form-control @error('bio') is-invalid @enderror" name="bio" rows="4" placeholder="اكتب نبذة مختصرة عنك">{{ old('bio', $user->bio) }}</textarea>
                        @error('bio')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-section">
                    <h3 class="section-title">تغيير كلمة المرور</h3>
                    
                    <div class="form-group">
                        <label>كلمة المرور الجديدة</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="اتركها فارغة إذا لم ترد تغييرها">
                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>تأكيد كلمة المرور الجديدة</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="أعد إدخال كلمة المرور الجديدة">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> حفظ التغييرات
                    </button>
                    <a href="{{ route('profile.index') }}" class="btn btn-outline">
                        <i class="fas fa-times"></i> إلغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>

<style>
.profile-edit-container {
    max-width: 800px;
    margin: 0 auto;
    background: white;
    padding: 2rem;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
}

.form-section {
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid #eee;
}

.form-section:last-child {
    border-bottom: none;
}

.section-title {
    color: var(--primary);
    margin-bottom: 1.5rem;
    font-size: 1.2rem;
}

.form-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 1px solid #eee;
}

.alert {
    padding: 1rem;
    margin-bottom: 1rem;
    border-radius: var(--radius);
}

.alert-danger {
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    color: #721c24;
}

.alert-success {
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    color: #155724;
}
</style>
@endsection 