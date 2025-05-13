<?php

namespace App\Livewire;

use App\Filament\Widgets\LatestOrders;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Stripe\Checkout\Session;
use Stripe\Stripe;

#[Title('Success - Teknogear')]
class SuccessPage extends Component {

    #[Url]
    public $session_id;

    public $order;

    public function mount()
    {
        $this->order = Order::with('address')->where('user_id', Auth::user()->id)->latest()->first();

        if ($this->session_id) {
            Stripe::setApiKey(config('services.stripe.secret')); // gunakan config
            $session_info = Session::retrieve($this->session_id);

            if ($session_info->payment_status === 'paid') {
                $this->order->payment_status = 'paid';
            } else {
                $this->order->payment_status = 'failed';
            }

            $this->order->save();
        }
    
        return view('livewire.success-page', [
            'order' => $this->order,
        ]);
    }
}
