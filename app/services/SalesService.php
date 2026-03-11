<?php
namespace App\Services;
use App\Core\Tenant;
use App\Repositories\{SaleRepository,SaleItemRepository,CommissionRuleRepository,CommissionRepository};
class SalesService {
public function index(): array {return (new SaleRepository())->allByTenant();}
public function create(array $data): int {
$saleRepo=new SaleRepository();$itemRepo=new SaleItemRepository();$ruleRepo=new CommissionRuleRepository();$commissionRepo=new CommissionRepository();
$saleId=$saleRepo->create(['tenant_id'=>Tenant::currentId(),'customer_id'=>$data['customer_id']??null,'total'=>$data['total']??0,'created_at'=>date('Y-m-d H:i:s')]);
foreach(($data['items']??[]) as $item){$item['tenant_id']=Tenant::currentId();$item['sale_id']=$saleId;$itemId=$itemRepo->create($item);$pct=(float)($ruleRepo->allByTenant()[0]['percentage']??30);$amount=((float)$item['price'])*($pct/100);$commissionRepo->create(['tenant_id'=>Tenant::currentId(),'therapist_id'=>$item['therapist_id']??0,'sale_item_id'=>$itemId,'amount'=>$amount,'status'=>'pending']);}
return $saleId;}
}
