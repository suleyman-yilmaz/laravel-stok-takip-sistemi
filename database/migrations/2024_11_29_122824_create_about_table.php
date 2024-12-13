<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });

        $about = [
            ['title' => 'Stok Takip Sistemi Genel Özellikleri:', 'description' => 'Stok takip sistemimizde kullanıcılar, anlık olarak tam bir kontrol sahibi olabilirler. Dashboard ekranında, tamamlanması gereken görevler, bu ay ve bu yıl içinde giriş yapılan ürünler, çıkış yapılan ürünler gibi detaylı veriler görüntülenir. Ayrıca, finansal raporlar üzerinden giren ve çıkan paralar arasındaki farkı görerek kârda ya da zararda olduklarını kolayca anlayabilirler. Tüm bu bilgiler kullanıcıya şeffaf bir şekilde sunulur ve günlük olarak giren ve çıkan ürün sayıları da gösterilir.'],
            ['title' => 'Ürün Girişi ve Çıkışı', 'description' => 'Sistemimizde ürünlerin giriş ve çıkış işlemleri oldukça basit ve hızlı bir şekilde yapılabilir. Kullanıcılar, stok kartları oluşturup, bu kartlar üzerinden giriş ve çıkış işlemleri yapabilirler. Ürünlerin takibi, her bir ürün için detaylı olarak güncellenebilir ve bu bilgiler anında kaydedilir. Ürünlerin sayıları ve türleri hakkında anlık raporlar alabilir, stok düzeylerini yönetebilirsiniz.'],
            ['title' => 'Finansal Raporlama', 'description' => 'Sistem, finansal süreçlerinizi kolayca takip edebilmeniz için detaylı raporlama araçları sunar. Giriş ve çıkışlar arasında oluşan para farkı, sistem tarafından otomatik olarak hesaplanır. Eğer giren paralar çıkandan fazla ise “Zarardasınız” uyarısı, çıkışlar girenden fazla ise “Kardasınız” bildirisi ekranda görünür. Bu finansal raporlar, kullanıcıların doğru kararlar almasına yardımcı olur ve kâr-zarar dengesini net bir şekilde gösterir.'],
            ['title' => 'Popüler Ürün Takibi', 'description' => 'Sistemimizde, bir stok kartına ait 10 adet giriş veya çıkış yapılmış ürünler, otomatik olarak popüler ürünler olarak işaretlenir. Bu sayede, en çok işlem gören ürünleri kolayca takip edebilir ve stok yönetimini bu verilere göre optimize edebilirsiniz. Popüler ürünler üzerinden hızlıca yeni giriş veya çıkış işlemi yapılabilir, bu da kullanıcılara büyük kolaylık sağlar.'],
            ['title' => 'İletişim ve Destek', 'description' => 'Stok takip sistemimizde, kullanıcılar herhangi bir sorunla karşılaştıklarında ya da yardım ihtiyaçları olduğunda bizimle kolayca iletişime geçebilirler. İletişim formu üzerinden taleplerini ileten kullanıcılarımıza, geri dönüşlerimiz hızlı ve etkili bir şekilde yapılır. Kullanıcılar ayrıca sistemle ilgili her türlü desteği alabilecekleri bu bölümde sorularını sorabilir, çözüm önerileri isteyebilirler.'],
            ['title' => 'Yardım Sayfası', 'description' => 'Kullanıcılarımızın sistemi daha verimli bir şekilde kullanabilmeleri için bir yardım sayfası sunuyoruz. Bu sayfada, sistemin temel kullanımına dair eğitim videoları bulunur. Bu videolar sayesinde, kullanıcılar adım adım sistemin nasıl kullanılacağına dair pratik bilgiler edinebilirler. Yardım sayfası, yeni başlayanlar için rehberlik sağlamak ve kullanıcıların zaman kaybı yaşamadan sisteme alışmalarını kolaylaştırmak amacıyla hazırlanmıştır.'],
        ];        
        DB::table('about')->insert($about);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about');
    }
};
