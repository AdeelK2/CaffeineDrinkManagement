import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { CustomerstatsComponent } from './customerstats/customerstats.component';
import { FormsModule, ReactiveFormsModule  } from '@angular/forms';
import {BrowserModule} from "@angular/platform-browser";
import {MatDialogModule} from '@angular/material/dialog';

const routes: Routes = [
  {
    path: 'order',
    component: CustomerstatsComponent
  },
];

@NgModule({
  declarations: [CustomerstatsComponent],
  imports: [
    CommonModule ,
    FormsModule,
    ReactiveFormsModule,
    MatDialogModule,
    RouterModule.forChild(routes),
  ]
})
export class CustomerspaceModule { }
