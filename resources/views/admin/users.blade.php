@extends('layouts.app')

@section('content')

<h1>👥 إدارة المستخدمين</h1>
<hr>

<div class="card p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>الدور الحالي</th>
                    <th>تغيير الدور</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge fs-6
                                @if($user->role == 'admin') bg-danger
                                @elseif($user->role == 'seller') bg-primary
                                @else bg-secondary @endif">
                                @if($user->role == 'admin') ⚙️ مدير
                                @elseif($user->role == 'seller') 🏪 بائع
                                @else 🛒 مشتري @endif
                            </span>
                        </td>
                        <td>
                            @if($user->id !== auth()->id())
                                <form method="POST"
                                      action="{{ route('admin.users.role', $user) }}"
                                      class="d-flex gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <select name="role" class="form-select" style="width:auto">
                                        <option value="buyer"
                                            {{ $user->role == 'buyer' ? 'selected' : '' }}>
                                            🛒 مشتري
                                        </option>
                                        <option value="seller"
                                            {{ $user->role == 'seller' ? 'selected' : '' }}>
                                            🏪 بائع
                                        </option>
                                        <option value="admin"
                                            {{ $user->role == 'admin' ? 'selected' : '' }}>
                                            ⚙️ مدير
                                        </option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">
                                        حفظ
                                    </button>
                                </form>
                            @else
                                <span class="text-muted">أنت</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            لا يوجد مستخدمون
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection