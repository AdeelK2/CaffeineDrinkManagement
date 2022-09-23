import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CustomerstatsComponent } from './customerstats.component';
import { ReactiveFormsModule } from '@angular/forms';

describe('CustomerstatsComponent', () => {
  let component: CustomerstatsComponent;
  let fixture: ComponentFixture<CustomerstatsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CustomerstatsComponent ],
      imports : [ ReactiveFormsModule ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(CustomerstatsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
