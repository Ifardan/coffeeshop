use App\Models\User;
use Illuminate\Support\Facades\Hash;

public function run(): void
{
    User::create([
        'name' => 'Owner',
        'email' => 'owner@gmail.com',
        'password' => Hash::make('123456'),
        'role' => 'owner',
    ]);

    User::create([
        'name' => 'Kasir',
        'email' => 'kasir@gmail.com',
        'password' => Hash::make('123456'),
        'role' => 'kasir',
    ]);
}