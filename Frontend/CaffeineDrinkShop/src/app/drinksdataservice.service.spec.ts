import { TestBed } from '@angular/core/testing';

import { DrinksdataserviceService } from './drinksdataservice.service';

describe('DrinksdataserviceService', () => {
  let service: DrinksdataserviceService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(DrinksdataserviceService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
