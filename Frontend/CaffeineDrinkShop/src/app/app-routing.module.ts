import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AdminloginComponent } from './adminspace/adminlogin/adminlogin.component';
import { AppComponent } from './app.component';

const routes: Routes = [
  {path:'',redirectTo:'customer/order',pathMatch:'full'},
  {path: 'admin',
    loadChildren: () => import('./adminspace/adminspace.module').then(m => m.AdminspaceModule)},
  {path: 'customer',
  loadChildren: () => import('./customerspace/customerspace.module').then(m => m.CustomerspaceModule)}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
