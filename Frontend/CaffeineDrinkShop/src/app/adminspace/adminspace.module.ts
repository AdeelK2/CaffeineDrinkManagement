import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AdminloginComponent } from './adminlogin/adminlogin.component';
import { DrinksComponent } from './drinks/drinks.component';
import { ReactiveFormsModule } from '@angular/forms';
import { RouterModule, Routes } from '@angular/router';
import {BrowserModule} from "@angular/platform-browser";

const routes: Routes = [
  {
    path: 'drinks',
    component: DrinksComponent
  },
  {
    path: 'login', component: AdminloginComponent
  }
];

@NgModule({
  declarations: [
    AdminloginComponent,
    DrinksComponent
  ],
  imports: [
    CommonModule,
    RouterModule.forChild(routes),
    ReactiveFormsModule
  ]
})
export class AdminspaceModule { }
